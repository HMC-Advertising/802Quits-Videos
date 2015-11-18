<?php

    function video_container($atts, $content=null){
        extract( shortcode_atts(
            array(
               "id" =>"ekK7peRxKGc",
               'title' => "Title",
               'copy' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc fermentum elit in posuere ornare. Cras eget sapien nisi. Sed viverra tristique nunc, vitae sollicitudin lacus mollis ut. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla in pretium nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. In facilisis rutrum urna sed varius. Aliquam gravida dui est, id viverra justo posuere nec.",
               'video_link' => "https://youtu.be/ekK7peRxKGc",
               'more_link' => "#",
               'div_id' => 'video_block'
            ), $atts )
        );
        $amountArray = explode("]", $content);
        $amount = count($amountArray) ;
        $amount = $amount -1;
        $amount = $amount." Videos";
      
        $output = "";
        $output .='<section class="video-block" id="'.$div_id.'">';
        $output .= '<div class="amount">'.$amount.'</div><div class="video-container">';  
        if(is_mobile()){ 
            $output.="<div style='text-align:center'><strong>Swipe Left or Right</strong></div>";
        }    
        
        $output .=' <div class="vidNav">
                <div class="vidImages">';    
        
        $output.= do_shortcode($content);
        
        $output .='</div>
            </div>';

        $output .='      
            <div class="vidContainer embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item"src="https://www.youtube.com/embed/'.$id.'?rel=0" frameborder="0" allowfullscreen>></iframe>
            </div>';
        $output .='
            <div class="contentdcm">
                <h1 class="vidTitle">'.$title.'</h1>
                <div class="copy_content">'.$copy.'</div></div></div></section>';
        $output .='<script type="text/javascript">
            (function ($) {
                var thumb = $("#'.$div_id.' .imageVideo a");
                var video = $("#'.$div_id.' iframe");
                var load = $(".loading");
                var id, title, content, morer, to, links;
                 
                thumb.on("click", function(e){
                    e.preventDefault();
                    thumb.find("img").removeClass("on").addClass("off")
                    $(this).find("img").removeClass("off").addClass("on");
                     
                    id = $(this).attr("data-src");
                    morer = $(this).attr("href");
                    content = $(this).attr("data-content");
                    title = $(this).attr("alt");
                    
                    $("#'.$div_id.' h1.vidTitle").html(title);
                    $("#'.$div_id.' .contentdcm .copy_content").html(content);
                    video.attr("src", "https://www.youtube.com/embed/"+id+"?rel=0");
                   
                })
            }(jQuery));
        </script>';
        return $output; 
    }
    add_shortcode("video_container", "video_container");


    // Add Shortcode
    function videos_shortcode( $atts ) {

        // Attributes
        extract( shortcode_atts(
            array(
               "id" =>"ekK7peRxKGc",
               'title' => "Title",
               'copy' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc fermentum elit in posuere ornare. Cras eget sapien nisi. Sed viverra tristique nunc, vitae sollicitudin lacus mollis ut. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla in pretium nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. In facilisis rutrum urna sed varius. Aliquam gravida dui est, id viverra justo posuere nec.",
                'more_link' => "#",
               'first_vid' => 'no'
            ), $atts )
        );
        if($first_vid == "yes"){
            $first ="on";
        }
        else{
            $first ="off";
        }
        if($more_link!="#" ){ 
            $m=' data-more="'.$more_link.'"';  
        }
        else{
            $m ="";
        } 

        $output = "";
        $output .='  <div class="imageVideo">
            <a href="'.$more_link.'" data-loading="image1" data-src="'.$id.'" alt="'.$title.'" data-content="'.$copy.'" class="image thumbnail"'.$m.'><img src="http://img.youtube.com/vi/'.$id.'/mqdefault.jpg" class="'.$first.'"></a></div>';

      
        return $output; 

     
    }
    add_shortcode("video_dia" ,"videos_shortcode");

    /*[video_container copy="" title="" id="" ]

[video_dia copy="" first_vid="yes" title="" id=""]

[video_dia copy="" title="" id=""]

[video_dia copy="" title="" id=""]

[video_dia copy="" title="" id=""]

[/video_container]
*/

