<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Text Analyzer</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <?php 

        $characters_number=0;
        $words_number=0;
        $lines_nmuber=0;

    if (isset($_POST['analyze'])) {
        $mText=$_POST['text'];        
        $text=new Text($mText);
        $characters_number=$text->characters();
        $words_number=$text->words();
        $lines_nmuber=$text->lines()+1;
    }

     ?>
    <body>
        <div class="container">
                <h1>Text Analyzer</h1><br>
            <div class="cont">
                <form method="post">
                    <textarea name="text" id="Text" cols="30" rows="10" placeholder="Enter Your Text"></textarea><br>
                    <input type="submit" name="analyze" value="Analyze!">
                </form>
                <div class="result">
                    <br>
                    <h2>Summary:</h2><br>
                     <div class="myResult"><span>Characters</span>   <span> <?php echo $characters_number; ?></span></div><hr><br>
                     <div class="myResult"><span>Words</span>   <span> <?php echo $words_number; ?></span></div><hr style="height:.1px;border-width:0;color:gray;background-color:gray">
                     <div class="myResult"><span>Lines</span>   <span> <?php echo $lines_nmuber; ?></span></div><br><hr><br>
                </div>
            </div>
        </div>
    </body>
</html>

<?php 
class Text{
    public $text;

    function __construct($text){
        $this->text=$text;
    }

    function characters(){
        return strlen($this->text);
    }

    function words(){
        return str_word_count($this->text);
    }

    function lines(){
        return substr_count($this->text, "\n");
    }
}
 ?>