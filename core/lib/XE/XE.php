<?php

class XE
{
    public $url;

    public function execute($url){
        if(empty($url)) {
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
        $sitemap = $this->parseRaw($sitemapRaw);
        $result['status'] = 'OK';
        $result['sitemap'] = $sitemap;
        return $result;
    }
    private function parseRaw($xmlRaw){

        if ($xmlRaw->sitemap){
            foreach ($xmlRaw as $xmlObject){
                $cascadeUrl = $xmlObject->loc->__toString();
                $arResult['INCLUDE'][] = $this->parseRaw($this->getXml($cascadeUrl));
            }
        }
        foreach ($xmlRaw as $xmlObject){
            $loc = $xmlObject->loc->__toString();
            $status = $this->getStatus($loc);
            if ($status == 200) {
                $arResult['OK'][] = $loc;
            }else{
                $arResult['TROUBLES'][] = array($loc => $status);
            }
        }
        return $arResult;
    }

    private function getStatus($url){
        $headers = get_headers($url, true, $this->getContext());
        return substr($headers[0], 9, 3);
    }

    private function getXml($url){
        libxml_set_streams_context($this->getContext());
        return simplexml_load_file($url);
    }

    private function getContext(){
        return stream_context_create(array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        ));
    }

}