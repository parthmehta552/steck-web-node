<?php
include '../../../Controller/Controller.php';
include '../../../Controller/URL.php';

$con = new Controller;
$jsondata = $_POST['jsondata'];
$json = $con->cUrl_Call(Get_Images_By_Id,$jsondata);
$arryData = (array)$json["response"]["data"];

if($json["response"]["error_code"]=='200'){

echo "<div class='slimScrollDiv well' style='overflow: scroll;overflow-x:scroll;width:auto; height: 500px;'>
  <div class='row'>";


  for($i=0;$i<count($arryData);$i++){

      echo "<div class='col-md-12' id='imgdiv-".$json["response"]["data"][$i]["_id"]."'>
      <div class='box box-default collapsed-box'>
            <div class='box-header with-border'>
              <div class='row'>
              <div class='col-sm-6'>
                <img src='"."View/userimg/".$json['response']['data'][$i]['path']."' id='upimg-".$json["response"]["data"][$i]["_id"]."' class='img-thumbnail'  style='height:300px;width:300px' alt='ALT NAME'>
              </div>
              <div class='col-sm-5 well' id='upcaption-".$json["response"]["data"][$i]["_id"]."'>
                ".$json['response']['data'][$i]['caption']."</p>
               </div>
               </div>
              <div class='box-tools pull-right'>
                <button type='button' class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-plus'></i></button>
                <button type='button' onclick='delimg(".'"'.$json["response"]["data"][$i]["_id"].'"'.")' class='btn btn-box-tool'><i class='fa fa-trash'></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class='box-body' style='display: none;'>
            <div class='row'>
            <div class='col-md-6'>
            <textarea class='form-control'  name='editcaptionimg' placeholder='Caption' maxlength='500' onkeyup='editcaptionchars(".'"'.$json["response"]["data"][$i]["_id"].'"'.")' id='editimagecaption-".$json["response"]["data"][$i]["_id"]."'>".$json['response']['data'][$i]['caption']."</textarea>
            <small id='editcaption-".$json["response"]["data"][$i]["_id"]."' class='pull-right'>Charaters 500</small>
            </div>
            <div class='col-md-4'>
            <input type='file' name='sortpicture'  id='editsortpicture-".$json["response"]["data"][$i]["_id"]."' required='required'>
            </div>
            <div class='col-md-2'>
            <button type='button' onclick='updateimagecaption(".'"'.$json["response"]["data"][$i]["_id"].'","'.$json['response']['data'][$i]['path'].'"'.")' id='done' name='done' class='btn btn-success'>Update</button>
            </div>
            </div>
              </div>
            <!-- /.box-body -->
          </div></div>";


}

}else{
  echo "<center>No images are uploaded for this query !</center>";
}
?>
<script>

function editcaptionchars(str){
  $("#editimagecaption-"+str).keyup(function(){
    var chrs = $("#editimagecaption-"+str).val();
    var count = 500 - chrs.length;
    $("#editcaption-"+str).html("Charaters "+count);
  });
}


function updateimagecaption(str,pathname){

var imagecaption = $("#editimagecaption-"+str).val();
var imagevalue =  $("#editsortpicture-"+str).val();
//alert(imagevalue);
//alert(pathname);
if(imagevalue!='' || imagecaption!=''){

  var file_data = $('#editsortpicture-'+str).prop('files')[0];

  var form_data = new FormData();
  form_data.append('file', file_data);
  form_data.append('id',str);
  form_data.append('caption',imagecaption);
  form_data.append('pathname',pathname);

  $.ajax({
              url: 'View/query/JS/updateimage.php', // point to server-side PHP script
              dataType: 'text',  // what to expect back from the PHP script, if anything
              cache: false,
              contentType: false,
              processData: false,
              data: form_data,
              type: 'post',
              success: function(php_script_response){
                  //$('#sortpicture-'+str).val('');
                  //$('#imagecaption-'+str).val('');
                  if(php_script_response=='200'){
                    notification("Add Image","Image updated !","success",'top-center',4000,false);
                    if($("#editsortpicture-"+str).val()!=''){
                      $("#upcaption-"+str).html(imagecaption);
                      $("#upimg-"+str).attr("src","View/userimg/"+$('#editsortpicture-'+str).prop('files')[0].name);
                    }else{
                      $("#upcaption-"+str).html(imagecaption);
                      $("#upimg-"+str).attr("src","View/userimg/"+pathname);
                    }

                  }else if(php_script_response=='201'){
                    notification("Add Image","Image not udated !","error",'top-center',4000,false);
                  }else if(php_script_response=='277'){
                    notification("Add Image","Only JPG are allowed !","info",'top-center',4000,false);
                  }else{
                    notification("Add Image","Something went wrong","warning",'top-center',4000,false);
                  }

                  //refre4(str);

              }
   });
}else{
notification("Image Update","Required fields need to be filled !",'info','top-center',4000,false);
}

}


$(function() {
  $("textarea[name='editcaptionimg']").keyup(function() {
    var name = $("textarea[name='editcaptionimg']").val();

  var qu = name.toLowerCase();
    var filtered = "";
        var badwords = [ "2g1c","2 girls 1 cup","acrotomophilia",
  "anal",
  "anilingus",
  "anus",
  "arsehole",
  "ass",
  "asshole",
  "assmunch",
  "auto erotic",
  "autoerotic",
  "babeland",
  "baby batter",
  "ball gag",
  "ball gravy",
  "ball kicking",
  "ball licking",
  "ball sack",
  "ball sucking",
  "bangbros",
  "bareback",
  "barely legal",
  "barenaked",
  "bastardo",
  "bastinado",
  "bbw",
  "bdsm",
  "beaver cleaver",
  "beaver lips",
  "bestiality",
  "bi curious",
  "big black",
  "big breasts",
  "big knockers",
  "big tits",
  "bimbos",
  "birdlock",
  "bitch",
  "black cock",
  "blonde action",
  "blonde on blonde action",
  "blow j",
  "blow your l",
  "blue waffle",
  "blumpkin",
  "bollocks",
  "bondage",
  "boner",
  "boob",
  "boobs",
  "booty call",
  "brown showers",
  "brunette action",
  "bukkake",
  "bulldyke",
  "bullet vibe",
  "bung hole",
  "bunghole",
  "busty",
  "butt",
  "buttcheeks",
  "butthole",
  "camel toe",
  "camgirl",
  "camslut",
  "camwhore",
  "carpet muncher",
  "carpetmuncher",
  "chocolate rosebuds",
  "circlejerk",
  "cleveland steamer",
  "clit",
  "clitoris",
  "clover clamps",
  "clusterfuck",
  "cock",
  "cocks",
  "coprolagnia",
  "coprophilia",
  "cornhole",
  "cum",
  "cumming",
  "cunnilingus",
  "cunt",
  "darkie",
  "date rape",
  "daterape",
  "deep throat",
  "deepthroat",
  "dick",
  "dildo",
  "dirty pillows",
  "dirty sanchez",
  "dog style",
  "doggie style",
  "doggiestyle",
  "doggy style",
  "doggystyle",
  "dolcett",
  "domination",
  "dominatrix",
  "dommes",
  "donkey punch",
  "double dong",
  "double penetration",
  "dp action",
  "eat my ass",
  "ecchi",
  "ejaculation",
  "erotic",
  "erotism",
  "escort",
  "ethical slut",
  "eunuch",
  "faggot",
  "fecal",
  "felch",
  "fellatio",
  "feltch",
  "female squirting",
  "femdom",
  "figging",
  "fingering",
  "fisting",
  "foot fetish",
  "footjob",
  "frotting",
  "fuck",
  "fuck buttons",
  "fudge packer",
  "fudgepacker",
  "futanari",
  "g-spot",
  "gang bang",
  "gay sex",
  "genitals",
  "giant cock",
  "girl on",
  "girl on top",
  "girls gone wild",
  "goatcx",
  "goatse",
  "gokkun",
  "golden shower",
  "goo girl",
  "goodpoop",
  "goregasm",
  "grope",
  "group sex",
  "guro",
  "hand job",
  "handjob",
  "hard core",
  "hardcore",
  "hentai",
  "homoerotic",
  "honkey",
  "hooker",
  "hot chick",
  "how to kill",
  "how to murder",
  "huge fat",
  "humping",
  "incest",
  "intercourse",
  "jack off",
  "jail bait",
  "jailbait",
  "jerk off",
  "jigaboo",
  "jiggaboo",
  "jiggerboo",
  "jizz",
  "juggs",
  "kike",
  "kinbaku",
  "kinkster",
  "kinky",
  "knobbing",
  "leather restraint",
  "leather straight jacket",
  "lemon party",
  "lolita",
  "lovemaking",
  "make me come",
  "male squirting",
  "masturbate",
  "menage a trois",
  "milf",
  "missionary position",
  "motherfucker",
  "mound of venus",
  "mr hands",
  "muff diver",
  "muffdiving",
  "nambla",
  "nawashi",
  "negro",
  "neonazi",
  "nig nog",
  "nigga",
  "nigger",
  "nimphomania",
  "nipple",
  "nipples",
  "nsfw images",
  "nude",
  "nudity",
  "nympho",
  "nymphomania",
  "octopussy",
  "omorashi",
  "one cup two girls",
  "one guy one jar",
  "orgasm",
  "orgy",
  "paedophile",
  "panties",
  "panty",
  "pedobear",
  "pedophile",
  "pegging",
  "penis",
  "phone sex",
  "piece of shit",
  "piss pig",
  "pissing",
  "pisspig",
  "playboy",
  "pleasure chest",
  "pole smoker",
  "ponyplay",
  "poof",
  "poop chute",
  "poopchute",
  "porn",
  "porno",
  "pornography",
  "prince albert piercing",
  "pthc",
  "pubes",
  "pussy",
  "queef",
  "raghead",
  "raging boner",
  "rape",
  "raping",
  "rapist",
  "rectum",
  "reverse cowgirl",
  "rimjob",
  "rimming",
  "rosy palm",
  "rosy palm and her 5 sisters",
  "rusty trombone",
  "s&m",
  "sadism",
  "scat",
  "schlong",
  "scissoring",
  "semen",
  "sex",
  "sexo",
  "sexy",
  "shaved beaver",
  "shaved pussy",
  "shemale",
  "shibari",
  "shit",
  "shota",
  "shrimping",
  "slanteye",
  "slut",
  "smut",
  "snatch",
  "snowballing",
  "sodomize",
  "sodomy",
  "spic",
  "spooge",
  "spread legs",
  "strap on",
  "strapon",
  "strappado",
  "strip club",
  "style doggy",
  "suck",
  "sucks",
  "suicide girls",
  "sultry women",
  "swastika",
  "swinger",
  "tainted love",
  "taste my",
  "tea bagging",
  "threesome",
  "throating",
  "tied up",
  "tight white",
  "tit",
  "tits",
  "titties",
  "titty",
  "tongue in a",
  "topless",
  "tosser",
  "towelhead",
  "tranny",
  "tribadism",
  "tub girl",
  "tubgirl",
  "tushy",
  "twat",
  "twink",
  "twinkie",
  "two girls one cup",
  "undressing",
  "upskirt",
  "urethra play",
  "urophilia",
  "vagina",
  "venus mound",
  "vibrator",
  "violet wand",
  "vorarephilia",
  "voyeur",
  "vulva",
  "wank",
  "wet dream",
  "wetback",
  "white power",
  "women rapping",
  "wrapping men",
  "wrinkled starfish",
  "xx",
  "xxx",
  "yaoi",
  "yellow showers",
  "yiffy",
  "zoophilia"
];


      $.each(badwords,function(){
          var hk = this;
          if(qu.includes(this))
          {
              notification("Caption Badwords","Please do not enter the badwords","error",'top-center',4000,true);
             filtered = qu.replace(this,"@***@");
				$("textarea[name='editcaptionimg']").val(filtered);


      }

      });

});
});

  </script>
