<?php

class XE
{
    public $url, $resAr;

    public function executeByStep($url, $step)
    {
        if (empty($url)) {
            $result['status'] = 'error';
            $result['message'] = 'Задан пустой URL';
            return $result;
        }
        $this->url = $url;
        $sitemapRaw = $this->getXml($this->url);
        if ($sitemapRaw == false) {
            $result['status'] = 'error';
            $result['message'] = 'Не удалось получить карту сайта';
            return $result;
        }
        $arLinks = $this->makeLinksAr($sitemapRaw);
        $down = ($step - 1) * 5;
        $up = $step * 5;
        for ($i = $down; $i < $up; $i++) {
            $status = $this->getStatus($arLinks[$i]);
            if ($status == 200) {
                $arResult['OK'][] = $arLinks[$i];
            } else {
                $arResult['TROUBLES'][] = array('link' => $arLinks[$i], 'status' => $status);
            }
        }
        return $arResult;
    }


    public function getSteps($url)
    {
        if (empty($url)) {
            $result['status'] = 'error';
            $result['message'] = 'Задан пустой URL';
            return $result;
        }
        $this->url = $url;
        $sitemapRaw = $this->getXml($this->url);
        if ($sitemapRaw == false) {
            $result['status'] = 'error';
            $result['message'] = 'Не удалось получить карту сайта';
            return $result;
        }
        $linksAr = $this->makeLinksAr($sitemapRaw);
        return ceil(count($linksAr) / 5);
    }

    private function makeLinksAr($xmlRaw)
    {
        if ($xmlRaw->sitemap) {
            foreach ($xmlRaw as $xmlObject) {
                $cascadeUrl = $xmlObject->loc->__toString();
                $this->makeLinksAr($this->getXml($cascadeUrl));
            }
        }
        foreach ($xmlRaw as $xmlObject) {
            $loc = $xmlObject->loc->__toString();
            $this->resAr[] = $loc;
        }
        return $this->resAr;
    }


    private function getStatus($url)
    {
        $headers = get_headers($url, true, $this->getContext());
        return substr($headers[0], 9, 3);
    }

    private function getXml($url)
    {
        libxml_set_streams_context($this->getContext());
        return simplexml_load_file($url);
    }

    private function getContext()
    {
        return stream_context_create(array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        ));
    }
}