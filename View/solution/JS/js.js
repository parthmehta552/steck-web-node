CKEDITOR.replace('war');
CKEDITOR.add
$(document).ready(function() {

  $("#q").html("<img src='View/gif/ring-alts.gif' height='40px' width='40px'> Getting queries.. ");

});

$(document).ready(function() {
  notification("Query Info", "Click query content to view in details about the query", 'info', 'bottom-right', 10000, true);
});

$(document).ready(function() {

  $('#war').load('View/editsolution/JS/loadmyanswer.php');


});



function updateans(str) {
  var data = $("#w" + str).html();
  alert(" size " + data.length);

}

$(document).ready(function() {

  $("#q").load('View/solution/JS/loadqu.php');

});

$("#getallq").click(function() {
  $("#q").load('View/solution/JS/loadqu.php');
  $("#querycontent").val('');
});

function deleteans(str) {

  var postdata = JSON.stringify({
    "_id": str,
    "isBlock": "true"
  });


  $.ajax({
    url: 'View/solution/JS/deleteans.php',
    type: 'POST',
    data: {
      jsondata: postdata
    },
    success: function(data, status, xhr) {
      if (data == '200') {
        notification("Delete Solution", success, 'success', 'top-center', 4000, false);
      } else if (data == '201') {
        notification("Delete Solution", fail, 'error', 'top-center', 4000, false);
      } else {
        notification("Delete Solution", unknown, 'warning', 'top-center', 4000, false);
      }

      refre5();
      refre6();
    }
  });


}

function undoans(str) {
  var postdata = JSON.stringify({
    "_id": str,
    "isBlock": "false"
  });
  $.ajax({
    url: 'View/solution/JS/undoans.php',
    type: 'POST',
    data: {
      jsondata: postdata
    },
    success: function(data, status, xhr) {
      if (data == '200') {
        notification("Delete Solution", success, 'success', 'top-center', 4000, false);
      } else if (data == '201') {
        notification("Delete Solution", fail, 'error', 'top-center', 4000, false);
      } else {
        notification("Delete Solution", unknown, 'warning', 'top-center', 4000, false);
      }
      refre5();
      refre6();

    }
  });


}

$(document).ready(function() {

  $("#answer").html("<img src='View/gif/ring-alts.gif' height='40px' width='40px'> Getting your answers.. ");

});
$(document).ready(function() {

  $("#answer").load('View/solution/JS/myanswer.php');



});
$(document).ready(function() {

  $("#deletedanswer").html("<img src='View/gif/ring-alts.gif' height='40px' width='40px'> Getting your deleted answers.. ");

});
$(document).ready(function() {

  $("#deletedanswer").load('View/solution/JS/deletedans.php');



});



var content = "";

$('#btn').click(function() {
  var postingcontent = $("#preview").html();
  var pure = postingcontent.replace(/&nbsp;/gi, '');
  var pure2 = pure.replace(/<p>/gi, '');
  var pure3 = pure2.replace('</p>', '');
  var pure4 = pure3.trim();
  //alert(pure4.length);
  if (pure4.length <= 50) {
    notification("Enter Solution", letter_limit, 'error', 'top-center', 4000, false);
  } else {

    $.ajax({
      url: 'View/solution/JS/addsolution.php',
      type: 'POST',
      data: {
        content: content
      },
      success: function(data, status, xhr) {
        if (data == '200') {
          notification("Enter Solution", success, 'success', 'top-center', 4000, false);

        } else if (data == '201') {
          notification("Enter Solution", fail, 'error', 'top-center', 4000, false);

        } else {
          notification("Enter Solution", unknown, 'warning', 'top-center', 4000, false);

        }
        CKEDITOR.instances.war.setData("");


        refre5();
      }
    });




  }


});


$("#inquerybtn").click(function() {
  var content = $("#querycontent").val();
  if(content.length!=0){
  var postdata = JSON.stringify({
    "query": content
  });
  $.ajax({
    url: 'View/solution/JS/getquerybycontent.php',
    type: 'POST',
    data: {
      jsondata: postdata
    },
    success: function(data, status, xhr) {
      $('#q').html(data);

    }
  });
}else{
  notification("Search Query", require, 'error', 'top-center', 4000, true);
}

});

function getq(str, str2) {

  var postdata = JSON.stringify({
    "id": str,
    "query": str2
  });
  $.ajax({
    url: 'View/solution/JS/solve.php',
    type: 'POST',
    data: {
      jsondata: postdata
    },
    success: function(data, status, xhr) {
      $('#query').html(data);
      $("#btn").load('View/solution/JS/s2.php');

    }
  });


}

function refre5() {

  $("#answer").load('View/solution/JS/myanswer.php');
}

function refre6() {

  $("#deletedanswer").load('View/solution/JS/deletedans.php');
}

function refre() {

  $("#q").load('View/solution/JS/loadqu.php');

}




function refre2() {

  $("#more").show();
  $("#less").show();

}


$("#search").keyup(function() {
  var q = $("#search").val();

  var postdata = '&q=' + q;
  $.ajax({
    url: 'View/solution/JS/getsq.php',
    type: 'POST',
    data: postdata,
    success: function(data, status, xhr) {
      $('#q').html(data);

    }
  });







});

function getqdata(str) {
  $('#dataimg-' + str).html("<center><img src='View/gif/ring-alts.gif' height='40px' width='40px'> Please wait.. </center>");
}

function getqdata(str) {

  var postdata = JSON.stringify({
    "referId": str,
    "referType": 2001,
    "isBlock": "false"
  });
  //alert(postdata);
  $.ajax({
    url: 'View/solution/JS/dataq.php',
    type: 'POST',
    data: {
      jsondata: postdata
    },
    success: function(data, status, xhr) {
      $('#dataimg-' + str).html(data);

    }
  });

}

$('#more').click(function() {

  $.ajax({
    url: 'View/solution/JS/more.php',
    success: function(data, status, xhr) {
      refre();
    }
  });

});

$('#moreans').click(function() {

  $.ajax({
    url: 'View/solution/JS/moreans.php',
    success: function(data, status, xhr) {
      refre5();
    }
  });

});


$('#less').click(function() {

  $.ajax({
    url: 'View/solution/JS/less.php',
    success: function(data, status, xhr) {
      refre();
    }
  });

});

$('#lessans').click(function() {

  $.ajax({
    url: 'View/solution/JS/lessans.php',
    success: function(data, status, xhr) {
      refre5();
    }
  });

});

$('#lessdans').click(function() {

  $.ajax({
    url: 'View/solution/JS/lessdans.php',
    success: function(data, status, xhr) {
      refre6();
    }
  });

});

$('#moredans').click(function() {

  $.ajax({
    url: 'View/solution/JS/moredans.php',
    success: function(data, status, xhr) {
      refre6();
    }
  });

});

timer = setInterval(updateDiv, 20);

function updateDiv() {
  var name = CKEDITOR.instances.war.getData();
  content = name;
  $("#preview").html(content);
  var qu = name.toLowerCase();
  var filtered = "";
  var badwords = ["2g1c", "2 girls 1 cup", "acrotomophilia",
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

  $.each(badwords, function() {
    var hk = this;
    if (qu.includes(this)) {
      $('#msg').html('<big><big><big><span data-toggle="tooltip" title="" class="badge bg-red" data-original-title="Please do not enter any badwords"> No Badwords Please !</span></big><big></big>');
      filtered = qu.replace(this, "@***@");
      content = filtered;

      CKEDITOR.instances.war.setData(filtered);


    }

  });
}

function uploadvideo(sid) {

  $("#videomsg-" + sid).html("<img src='View/gif/ring-alts.gif' height='40px' width='40px'> please wait...");


  var file_data = $('#videofile-' + sid).prop('files')[0];
  var caption = $("#caption-" + sid).val();
  var desc = $("#desc-" + sid).val();

  var form_data = new FormData();
  form_data.append('file', file_data);
  form_data.append('id', sid);
  form_data.append('caption', caption);
  form_data.append('desc', desc);

  $.ajax({
    url: 'View/solution/JS/addvideo.php', // point to server-side PHP script
    dataType: 'text', // what to expect back from the PHP script, if anything
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    type: 'post',
    success: function(php_script_response) {
      $("#videomsg-" + sid).html(php_script_response); // display response from the PHP script, if any
      $('#videofile-' + sid).val('');
      $('#caption').val('');
      listvideo(sid)
    }
  });







}

function listvideo(sid) {
  $("#listvideo-" + sid).html("<img src='View/gif/ring-alts.gif' height='40px' width='40px'> please wait...");
  var postdata = '&id=' + sid;
  $.ajax({
    url: 'View/solution/JS/listvideo.php', // point to server-side PHP script
    type: 'POST',
    data: postdata,
    success: function(data, status, xhr) {
      $("#listvideo-" + sid).html(data);
    }

  });

}

function playvideo(vid, sid) {

  $("#videoplay-" + sid).html("<img src='View/gif/ring-alts.gif' height='40px' width='40px'> playing...");

  var postdata = 'vid=' + vid + '&sid=' + sid;
  $.ajax({
    url: 'View/solution/JS/playvideo.php', // point to server-side PHP script
    type: 'POST',
    data: postdata,
    success: function(data, status, xhr) {
      $("#videoplay-" + sid).html(data);
    }

  });
}
