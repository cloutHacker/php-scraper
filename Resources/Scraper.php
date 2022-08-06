<?php
#This is a copyright software made by Kibiwott
#follow me at github at kibiwottderick.Am sure you will be delighted.
namespace Resources;

use DOMDocument;

class Scraper
{

    public $source;
    public $html = '';
    public $domObjects;
    public $htmlText = '';
    public function __construct(string $site)
    {
        $this->source = $site;
    }
    public function scrape()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->source);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $html = curl_exec($curl);
        $this->html = $html;
        return $this;
    }
    /**
     * @return array
     */
    private function storeArray($haystack, array $array)
    {
        foreach ($haystack as $item) {
            $array[] = $item;
        }
        return $array;
    }
    private function insertElements($objects, $array)
    {
        foreach ($objects as $object) {
            $textContent = $object->textContent;
            $array[] = $textContent;
        }
        return $array;
    }
    private function initDom($source)
    {
        $dom = new DOMDocument();
        @$dom->loadHTML($source);
        return $dom;
    }
    protected function insertTextContent(): void
    {
        //getting all the text content

    }
    /**
     * @return array
     * 
     */
    public function filterTags(string $tagname)
    {
        $dom = $this->initDom($this->html);
        $tags = $dom->getElementsByTagName($tagname);
        $content = array();
        // storing the actual object for later filtering
        $this->domObjects = $tags;
        $this->insertTextContent();
        //inserting all the content into an array
        $this->html = $this->insertElements($tags, $content);
        return $this;
    }
    /**
     * @return array
     */
    public function filterAttr(string $attr)
    {
        $array = array();
        $contents = $this->domObjects;
        foreach ($contents as $content) {
            $attrContent = $content->getAttribute($attr);
            $array[] = $attrContent;
        }
        $this->html = $array;
        return $this;
    }
    // executing the html and printing the content
    public function exec()
    {
        return $this->html;
    }
}
