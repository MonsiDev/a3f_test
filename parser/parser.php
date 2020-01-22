<?
    class Parser {

        private $ParserData = [];

        public static function loadPage($url) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.3; W…) Gecko/20100101 Firefox/57.0");
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

            $parser = new Parser();
            $parser->ParserData['content'] = curl_exec($ch);
            
            curl_close($ch);
            return $parser;
        }

        public function getTagArray() {
            $rxTag = '/<\s*([^\/!A-Z1-9][a-z1-9]*)/';
            $rxTagComment = '/<(!--)/';
            $rxTagHTML = '/<\s*(!DOCTYPE)/';
            if (!empty($this->ParserData)) {
    
                $content = $this->ParserData['content'];
                preg_match_all($rxTagHTML, $content, $mTagHTML);
                preg_match_all($rxTagComment, $content, $mTagComment);
                preg_match_all($rxTag, $content, $mTag);
    
                return array_count_values(array_merge($mTagHTML[1], $mTagComment[1], $mTag[1]));
            }
            return [];
        }
    }