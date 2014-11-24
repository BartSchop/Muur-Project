<?php 
        function removeeviltags ($source)
        {
            $allowedtags = '<img>';
            $source = strip_tags($source, $allowedtags);
            $source = preg_replace('/<(.*?)>/ie', "'<'.removeevilattributes('\\1').'>'", $source);
            $source = stripslashes($source);
            return $source;
        }
        function removeevilattributes ($tagsource)
        {
            $stripattrib = '/javascript:|onclick|ondblclick|onmousedown|onmouseup|onmousedown|'
             . 'onmousemove|onmouseout|onkeypress|onkeydown|onkeyup/';
            $tagsource = stripslashes($tagsource);
            $tagsource = preg_replace($stripattrib, '', $tagsource);
            return $tagsource;
        }
?>