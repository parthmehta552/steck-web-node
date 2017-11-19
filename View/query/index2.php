<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Stecker Code</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include "View/CSS_JS_Links/CSS_Links.php"; ?>
  <style>
  .p{ width: 20em; overflow-wrap: break-word;color :black; }

  </style>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <?php include "View/header_footer/header.php"; ?>

  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <p id="msg7"></p>
        <h1>
          Query for <?php echo $_SESSION["lang_name"]; ?>
          <small>
           </small>
        </h1>

      </section>

      <!-- Main content -->
      <section class="content">

        <div id="deletemsg"></div>
        <!-- left column -->
<div class="row">
  <div class="col-md-6">
        <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Post Query</h3>
                      <small id="msg67"></small>
                      </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="" id="form1" name="form1"  method="post">
                      <div class="box-body">

                          <div class="form-group has-feedback">
                          <input type="text" class="form-control" name="query" list="cquery" id="query" style="height:50px;"  maxlength="1000" placeholder="Start asking....." required="required" />
                          <small class="pull-right" id="char">Charaters 1000</small>
                        <datalist id="cquery">

                              </datalist>
                        </div>


                        <div class="form-group">
                          <p class="help-block" id="msg4">

                          </p>
                          <p class="help-block">
                            <button type="submit" id="done" name="done"  class="btn btn-primary">Submit</button>

                          </p>
                        </div>
                        <div class="box-header with-border">
                          <h6 class="box-title">Current posting queries</h6> <small class="pull-right"><a href="#" id="refresh">Refresh</a></small>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" id="frm2" action="final.php" enctype="multipart/form-data" method="post">
                          <div class="slimScrollDiv" id="querydiv" style="overflow: scroll;overflow-x: hidden; width: auto; height: 200px;">
                          <div class="box-body">
                            <ul class="products-list product-list-in-box" id="qudata" >

                      </ul>


                          </div>
                        </div>
                      </div>
                      <!-- /.box-body -->

                      <div class="box-footer">
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true"> &nbsp; Your posted queries </i>
</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false"> &nbsp; Query Trash</a></li>
              </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">

                            <div id="msgedit"></div>
                            <div class="slimScrollDiv" id="yourquerydiv" style="overflow: scroll;overflow-x: hidden; width: auto; height: 250px;">
                              <div class="box-body">

                              <ul class="todo-list ui-sortable" id="qudata2"></ul>
                            </div>
                          </div>
                        </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div class="slimScrollDiv" style="overflow: scroll;overflow-x: hidden; width: auto; height: 250px;">
                    <div id="msgedit2"></div>
                  <div class="box-body">

                  <ul class="todo-list ui-sortable" id="qudata3">


                  </ul>
                </div>
              </div>
            </div>

            </div>
            </div>

                          </div>
                              <div class="col-md-6">




                              </div>
                        </div>





        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "View/header_footer/footer.php";?>
</div>
<!-- ./wrapper -->
<?php include "View/CSS_JS_Links/JS_Links.php"; ?>
<script src="View/query/JS/js.js"></script>
<script src="View/query/JS/other.js"></script>
<script>




jQuery(function($){

$("#bold").click(function(){
var hilht = window.getSelection();
var span = '<b>' + hilht + '</b>';
var text = $("#query").val();
$("#query").val(text.replace(hilht,span));

});



});

function allLetter(inputtxt)
  {
   var letters = /^[A-Za-z\s]+$/;
   if(inputtxt.value.match(letters))
     {
      return true;
     }
   else
     {
       document.getElementById("msg2").innerHTML = "Please Enter only Letters in Full name";
       document.getElementById("uname").value = "";
       return false;
     }
  }
</script>
<script>
$("#form1").submit(function(){
return false;

});








</script>

<script>

$(function() {
$("#query").keyup(function() {
    var name = $('#query').val();
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
                        $('#msg4').html('<big><big><big><span data-toggle="tooltip" title="" class="badge bg-red" data-original-title="Please do not enter any badwords"> No Badwords Please !</span></big><big></big>');
             filtered = qu.replace(this,"@***@");
				$('#query').val(filtered);


      }

      });

});
});


</script>


</body>
</html>
