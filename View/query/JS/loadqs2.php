<?php

include '../../../Controller/Controller.php';
include '../../../Controller/URL.php';
$con = new Controller;
$userid = $_SESSION['userdata']['id'];
$langid = $_SESSION["lang_id"];

$generate = array("languages_id" => $langid, "users_id" => $userid, "isBlock" => "false");
$jsondata = json_encode($generate);
$json = $con->cUrl_Call(Get_Query_User,$jsondata);
if($json["response"]["error_code"]=='201'){
  echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Nothing ! </strong> No Data Found</div>";
}else{

  $dataarray = (array)$json["response"]["data"];
  for($i=0;$i<count($dataarray);$i++){
    echo "
    <div class='dropdown pull-right label bg-blue'>
    <a id='dLabel' data-target='#' href='' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false' style='color:white;'><small><i class='glyphicon glyphicon-menu-down'></i></small></span>
    </a>

    <ul class='dropdown-menu' aria-labelledby='dLabel' style='color:black'>
    <li id='ed' onclick='getimg(".'"'.$json["response"]["data"][$i]["_id"].'"'.");loadingmsg(".'"'.$json["response"]["data"][$i]["_id"].'"'.")' data-toggle='modal' data-target='#exampleModal2-".$json["response"]["data"][$i]["_id"]."' data-whatever='@mdo' ><a href='#'><small><i class='glyphicon glyphicon-plus'></i> &nbsp;&nbsp; Add / View photos</small></a></li>
    <li id='ed' data-toggle='modal' data-target='#exampleModal-".$json["response"]["data"][$i]["_id"]."' data-whatever='@mdo' ><a href='#'><small><i class='glyphicon glyphicon-pencil'></i> &nbsp;&nbsp; Edit query</small></a></li>
    <li id='edr' onclick='getdelimg(".'"'.$json["response"]["data"][$i]["_id"].'"'.");' data-toggle='modal' data-target='#exampleModal22-".$json["response"]["data"][$i]["_id"]."' data-whatever='@mdo' ><a href='#'><small><i class='glyphicon glyphicon-trash'></i> &nbsp;&nbsp;  Trash photos</small></a></li>
    <li id='del' data-toggle='modal' data-target='#exampleModal1-".$json["response"]["data"][$i]["_id"]."' data-whatever='@mdo'><a href='#'> <small><i class='glyphicon glyphicon-remove'></i> &nbsp;&nbsp;  Trash query</small></a></li>

    </ul>
  </div>

    <li id='qu-".$json["response"]["data"][$i]["_id"]."'>

        <span class='text' style='width:450px;word-break:break-all'>".$json["response"]["data"][$i]["content"]."
        <p><small class='text-muted'> ".date("jS M y g:ia",strtotime($json["response"]["data"][$i]["datetime"]))."</small> </span></p>





          <div class='modal fade' id='exampleModal-".$json["response"]["data"][$i]["_id"]."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'>
          <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <h4 class='modal-title' id='exampleModalLabel'>Edit your query here</h4>
            </div>
            <div class='modal-body'>
              <form id='ids'>
              <div class='form-group has-feedback'>
              <input type='hidden' value='".$json["response"]["data"][$i]["_id"]."' id='ids' />
              <textarea class='form-control' rows='3' maxlength='1000' name='query2' id='query2-".$json["response"]["data"][$i]["_id"]."' onkeyup='countchar(".'"'.$json["response"]["data"][$i]["_id"].'"'.")' placeholder='Enter ...' required='required'>".$json["response"]["data"][$i]["content"]."</textarea>  <span class='glyphicon glyphicon-pencil form-control-feedback'></span>
              <small class='pull-right' id='chars-".$json["response"]["data"][$i]["_id"]."'>Charaters 1000</small>
              <p id='msg8-".$json["response"]["data"][$i]["_id"]."' name='msg8'> </p>
              <p id='msg9'></p>
              </div>

            </div>
            <div class='modal-footer'>
              <button type='button' id='dismis' class='btn btn-default' data-dismiss='modal'>Close</button>
              <button type='submit' id='doneedit' onClick='edit(".'"'.$json["response"]["data"][$i]["_id"].'"'.")' name='doneedit' class='btn btn-primary'>Save Changes</button>
  </form>
            </div>
          </div>
          </div>
          </div>


  <div class='modal fade' id='exampleModal1-".$json["response"]["data"][$i]["_id"]."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'>
          <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <h4 class='modal-title' id='exampleModalLabel'><p id='msg45'>Are you sure want to delete ?</p></h4>
            </div>

             <div class='modal-footer'>
              <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
              <button type='submit' id='doneedit' onClick='del(".'"'.$json["response"]["data"][$i]["_id"].'"'.")' name='doneedit' class='btn btn-primary'>Yes</button>
  </form>
            </div>
          </div>
          </div>
          </div>


          <div class='modal fade' id='exampleModal2-".$json["response"]["data"][$i]["_id"]."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'>
                  <div class='modal-dialog modal-lg' role='document'>
                  <div class='modal-content'>

                    <div class='modal-header'>
                    <form id='img' method='post'>
                      <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                      <h4 class='modal-title' id='exampleModalLabel'><p id='msg45'>Add photos for better understand the query</p>
                      <small>".$json["response"]["data"][$i]["content"]."</small>
                                        </h4>
                    </div>
                    <div class='modal-body'>
                    <div class='row'>
                    <div class='col-md-6'>
                    <textarea class='form-control' name='captionimg' placeholder='Caption' maxlength='500' onkeyup='captionchars(".'"'.$json["response"]["data"][$i]["_id"].'"'.")' id='imagecaption-".$json["response"]["data"][$i]["_id"]."'></textarea>
                    <small id='caption-".$json["response"]["data"][$i]["_id"]."' class='pull-right'>Charaters 500</small>
                    </div>
                    <div class='col-md-3'>
                    <input type='file' name='sortpicture'  id='sortpicture-".$json["response"]["data"][$i]["_id"]."' required='required'>
                    </div>
                    <div class='col-md-3'>
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                    <button type='submit' id='doneedit' onClick='upload(".'"'.$json["response"]["data"][$i]["_id"].'"'.")' name='doneedit' class='btn btn-primary'>Upload</button>
                    </div>
                    </div>
                    <p id='msgup-".$json["response"]["data"][$i]["_id"]."'></p>

                      <br>
                      <div id='imgload-".$json["response"]["data"][$i]["_id"]."' class='modal-body'></div>
                      <br>
                    </div>
                    <div class='modal-footer'>
          </form>
                    </div>
                  </div>
                  </div>
                  </div>


                  <div class='modal fade' id='exampleModal22-".$json["response"]["data"][$i]["_id"]."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'>
                          <div class='modal-dialog modal-lg' role='document'>
                          <div class='modal-content'>

                            <div class='modal-header'>
                            <form id='img' method='post'>
                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                              <h4 class='modal-title' id='exampleModalLabel'><p id='msg45'>Undo photos of your query</p>
                              <small>".$json["response"]["data"][$i]["content"]."</small>
                                                </h4>
                            </div>
                            <div class='modal-body'>

                              <p id='msgupu-".$json["response"]["data"][$i]["_id"]."'></p>

                              <div id='delimgload-".$json["response"]["data"][$i]["_id"]."' class='modal-body'></div>
                              <br>
                            </div>

                          </div>
                          </div>
                          </div>
    </li>
      <p></p>
    ";

  }

}





?>

<script>

function countchar(str){
  var chrs = $("#query2-"+str).val();
  var count = 1000 - chrs.length;
  //alert(count);
  $("#chars-"+str).html("Charaters "+count);

}

$("#query2").keyup(function(){
});



$('#img').submit(function(){
return false;

});

function edit(str){
  var query = $('#query2-'+str).val();
  var postdata = JSON.stringify({ "_id" : str , "content" : query });
if(query!=''){
  $.ajax({
              url: 'View/query/JS/edit.php', // point to server-side PHP script
              type: 'POST',
              data: { jsondata  : postdata },
                success: function(data,status,xhr){
                  if(data=='200'){
                    notification("Edit Query","Query updated",'success','top-center',4000,false);
                  }else if(data=='201'){
                    notification("Edit Query","Query not updated",'error','top-center',4000,false);
                  }else{
                    notification("Edit Query","Something went wrong",'warning','top-center',4000,false);
                  }
                  $(".btn-default").click();
                  $(".btn-default").click();
                  refre();
                  refre2();
              }
   });
  }else{
    notification("Edit Query","Require field can not be empty",'error','top-center',4000,false);
  }


}

function del(str)
{

  var postdata = JSON.stringify({ "_id" : str , "isBlock" : "true" });

  $.ajax({
              url: 'View/query/JS/delete.php', // point to server-side PHP script
              type: 'POST',
              data:  { jsondata : postdata },
                success: function(data,status,xhr){

                  if(data=='200'){
                    $("#msgedit").html("<div class='alert alert-success alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Deleted ! </strong>your query deleted ! </div>");
                  }else if(data=='201'){
                    $("#msgedit").html("<div class='alert alert-danger alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Not Deleted! </strong> Sorry, Your query not deleted </div>");
                  }else{
                    $("#msgedit").html("<div class='alert alert-warning alert-dismissible fade in' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Ohh! </strong> Something went wrong </div>");
                  }
                  $(".btn-default").click();
                  $(".btn-default").click();
                  $(".btn-default").click();
                  refre();
                  refre2();
                  refre3();

              }
   });

}

$(function() {
  $("textarea[name='captionimg']").keyup(function() {
    var name = $("textarea[name='captionimg']").val();
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
				$("textarea[name='captionimg']").val(filtered);


      }

      });

});
});


$(function() {
  $("textarea[name='query2']").keyup(function() {
    var name = $("textarea[name='query2']").val();
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
				$("textarea[name='query2']").val(filtered);


      }

      });

});
});


</script>
