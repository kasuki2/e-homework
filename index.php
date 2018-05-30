<?php
ini_set( 'session.cookie_httponly', 1 );
session_start();

if(!isset($_SESSION["tempide"]))
{
    $_SESSION["tempide"] = "0";
}
if(!isset($_SESSION["felhasz"]))
{
    $_SESSION["felhasz"] = "0";
}
if(!isset($_SESSION["jelszo"]))
{
    $_SESSION["jelszo"] = "0";
}



?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ehw</title>


    <link rel="stylesheet" type="text/css" href="css_sender2.css">
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="stylesheet" type="text/css" href="helpers.css">

    <link href='https://fonts.googleapis.com/css?family=Nanum Pen Script' rel='stylesheet'>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback2&render=explicit" async defer></script>


    <style>
        html
        {
            height: 100%;
        }
        body
        {
            margin: 0;
            padding: 0;
            width: 100%;
           overflow: hidden;
           background-color: #efefef;

        }

    </style>


    <script>


        function matchMail(ele)
        {
            var pass1 = document.getElementById("pw1").value.trim();

            var noEl = document.getElementById("ano");
            if(ele.value == pass1)
            {
                noEl.innerHTML = "OK";
                noEl.style.color = "#00aa00";
            }
            else
            {
                noEl.innerHTML = "NO";
                noEl.style.color = "#ff0000";
            }

        }



        function init()
        {
            var tempo = document.getElementById("tempida").value.trim();


            var idegen =  document.getElementById("inName").value;
            var idegen2 = document.getElementById("inPass").value;


            var benn = true;
            if(tempo === "0")
            {
                benn = false;
            }
            else
            {
                benn = true;
            }
          //  alert('benn: ' + benn);
            var lg = getStorage("lang");
            if(lg != null)
            {
                globNyelv = lg;
                manageLang(); // language fill in
            }
            else
            {
                globNyelv = 1;
                manageLang(); // language fill in
            }


            if(benn)
            {


                document.getElementById("usNamein").innerHTML = idegen;
                document.getElementById("wrapper_login").style.display = "none";
                document.getElementById("workTop1").innerHTML = "<div class='keretDiv' style='background-color: #ffffff;padding: 36px'  ><span id='welcome1'>" +  globLang.gotyet  + "</span><span style='cursor: pointer' onclick='getHomeW();' >" + globLang.gotyet3 + " </span><span id='welcome2'>" + globLang.gotyet2 + "</span></div>";
                document.getElementById("wrapper1").style.display = "block";
                dealMenuButt();


               // fillLanguage();

             //   updateHomework(10);
                var aUserNeve = document.getElementById("inName").value.trim();
                var passWor = document.getElementById("inPass").value.trim();

                var kuld = "user=" + aUserNeve + "&pw=" + passWor + "&code=1" + "&num=" + 10; // code 1 get howmework
                var filename = "MAJAXOK/ajaxHwSend.php";

                updateHW(filename, kuld).then(function(res)
                {
                    hwobj = JSON.parse(res);
                    fillHomework();
                });
             //   promise.then(fillHomework);
            }
            else
            {
                document.getElementById("wrapper_login").style.display = "block";
                getPw();
            }


        }

        function spawnNotification(theBody,theIcon,theTitle) {
            var options = {
                body: theBody,
                icon: theIcon
            }
            var n = new Notification(theTitle,options);
            setTimeout(n.close.bind(n), 5000);
        }
       // window.onload = init();

        function isEnter(e, c)
        {
            if(e.keyCode == 13)
            {
                sendInfo(c);
            }
        }


        function changePW()
        {
            document.getElementById("workTop1").innerHTML = "";
            document.getElementById("changeEmail").style.display = "none";
            document.getElementById("changePassword").style.display = "block";
        }

        function changeEMAIL()
        {
            document.getElementById("workTop1").innerHTML = "";
            document.getElementById("changePassword").style.display = "none";
            document.getElementById("changeEmail").style.display = "block";
        }



        function getPw()
        {
            if(getStorage("usname") != null)
            {
                document.getElementById("neve").value = getStorage("usname");
            }

            if(getStorage("pw") != null)
            {
                document.getElementById("jelszava").value = getStorage("pw");
            }
        }

        function popUpFill() {
            if(getStorage("usname") != null)
            {
                document.getElementById("popUpName").value = getStorage("usname");
            }

            if(getStorage("pw") != null)
            {
                document.getElementById("popUpPass").value = getStorage("pw");
            }
        }

        function stor()
        {
            openContact();
        }
        /*
        document.onreadystatechange = function() {
            if (document.readyState === 'complete') {
                // document ready
                init();
            }
        };
        */
        window.onload = init;





    </script>



</head>

<body  >
<div id="fullCover" style="display: none; position: absolute;width: 100%;height: 100%;top:0;left:0;background-color: rgba(0,0,0,0.35);z-index: 1000" >

    <div style="display: table-cell;vertical-align: middle" >
        <div style="margin-left: auto;margin-right: auto;width:400px;background-color: #ffffff;text-align: center" >
            <div style="text-align: right" ><div class="closeButton" onclick="closePopUp();" >X</div></div>
            <div style="text-align: left;padding-left: 36px;padding-right: 36px;padding-bottom: 36px;padding-top: 12px" >
                <div id="sessOver" >Session is over. Please sign in again.</div>
                <div>Név:</div>
                <input type="text" id="popUpName" >
                <div>Jelszó:</div>
                <input type="password" id="popUpPass" onkeyup="isEnter(event, 99);" >
                <div style="text-align: center;margin-top: 8px">
                <div class="singInButton" style="background-color: #1a2d5c;color: #ffffff" onclick="sendInfo(99)" >BELÉPÉS</div>
                </div>
                <div style="text-align: center;margin-top: 4px" >
                    <span id="popUpMessage">-</span>
                </div>
            </div>
        </div>

    </div>

</div>

<div id="wrapper1" style="display: none;width: 100%;overflow: scroll" onclick="clrPopups();">

    <div id="menuFrame" style="width: 100%;padding-top:4px;margin-right: auto;margin-left: auto;background-color: #1f3864;height: auto " >

        <div style="width: 80%;margin-left: auto;margin-right: auto" >

            <div id="baldiv" style="width: 50%;height:90px;display: inline-block" >
                <img src="IMAGES/ehw_logo3.png" style="width: 80px;display: inline-block;margin-top: 12px;cursor: pointer" onclick = location.reload(); >
            </div>


            <div id="jobbdiv" style="width: 49%;height:90px;display: inline-block;text-align: right;vertical-align: top">
                <div style="color: #ffffff;text-align: right" ><span style="cursor: pointer;color: #ffffff" onclick="changeLanguage(0);" >HU</span><span>|</span><span style="cursor: pointer" onclick="changeLanguage(1);" >EN</span></div>

                <table style="float: right;table-layout: fixed" >
                    <tr>
                        <td id="vocgem" style="padding-right: 24px;text-align: left;color: #ffe31b;font-family: Aldrich, Tahoma, Arial, serif;visibility: hidden;" ><span style="cursor: pointer" onclick="putinLoader();" >gram-gem</span><br><span style="cursor: pointer" onclick="getVocGem()" >voc-gem</span></td>
                        <td onclick="getAccount(0);" style="text-align: center;cursor: pointer;padding-right: 10px;position: relative;height: 50px"  >

                                <img src="IMAGES/einstein-arc-full.png" style="width: 46px;position: absolute;top:0;left:0" >
                                <img id="arc" class="arci" src="IMAGES/einstein-arc.png" style="width: 46px;position: absolute;top:0;left:0" >

                        </td>
                        <td style="text-align: center" >
                            <img onclick="sendInfo(2);" style="display:none;width: 40px" src="IMAGES/singnout2.png">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="color: #ffe31b;font-size: 10px;font-weight: bold;font-family: Arial, sans-serif;padding-right: 10px;text-align: center">
                            <span id='belep'>Belépve: </span><span id="usNamein"></span><img src="IMAGES/singnout2.png" onclick="sendInfo(2)" style="width: 16px;margin-left: 4px;cursor: pointer" >
                        </td>
                        <td style="text-align: center" >
                            <div id="kilep" style="display:none;color: #ffe31b;font-size: 10px;font-weight: bold;font-family: Arial, sans-serif;margin-top: 12px" >GET OUTTA HERE</div>
                        </td>
                    </tr>
                </table>

            </div>









        </div>


        <div style="width: 80%;margin-left: auto;margin-right: auto;text-align: center;padding-top: 4px;padding-bottom: 4px;position: relative" >
            <div class="menuButt" id="ujHaziButt" onclick="getHomework(this);" ><span id="ujhw" >ÚJ HÁZI</span><span class="jelzoSzam" id="assHW" >3</span></div>
            <div class="menuButt" onclick="checkSubmitted(this);"  ><span id="beadhazi" >BEADOTT HÁZI</span><span class="jelzoSzam" id="subHW" >3</span></div>
            <div class="menuButt" onclick="checkCorrected(this);"   ><span id="kijavhazi" >KIJAVÍTOTT HÁZI</span><span class="jelzoSzam"  id="corHW" >3</span></div>
        </div>
        <div id="loaderDiv" ><div class="loaderAnim" ></div><div class="loaderAnim2" ></div><div class="loaderAnim3" ></div></div>
    </div>

    <table id="workTop1Frame">
        <tr>
            <td id="workTop1" class="taskContentNormal" >




            </td>
            <td id="helpContent" class="helpContentNormal" >

            </td>
        </tr>
    </table><!-- workTop1Frame vege -->

    <div id="tester" style="width: 700px;margin-left: auto;margin-right: auto;background-color: #efefef;padding: 12px"></div>
    <div id="testResults"></div>




</div><!-- wrapper1 vege -->


<input type="hidden" id="tempida" value="<?php echo $_SESSION["tempide"]; ?>">
<input type="hidden" id="inName" value="<?php echo $_SESSION["felhasz"]; ?>">
<input type="hidden" id="inPass" value="<?php echo $_SESSION["jelszo"]; ?>">








<div id="wrapper_login" style="display: none;width: 100%;background-color: #536eca">
    <div id="bigFrame" style="display: none; padding: 5px;background-color: red;text-align: center" >
    <div id="balFrame" style="width: 80px;height: 500px;background-color: #1a6cfb;display: inline-block;vertical-align: top;margin-top: 24px" >

    </div>




    </div><!-- bigFrame end -->
    <div id="nagyKeretKeret" style="display: table;position: absolute;height: 100%;width: 100%;background-color: #efefef" >

        <div id="centering" style="display: table-cell;vertical-align: middle" >

    <div id="nagyKeret" style="background-color: #ff8eb0;max-width: 600px;margin-left: auto;margin-right: auto">

        <table cellpadding="0" cellspacing="0" style="margin-left: 0;font-family: Arial, sans-serif;max-width: 600px" >
            <tr>
                <td rowspan="5" style="background-color: #1a2d5c;color: white;width: 140px;vertical-align: top" >

                <img  ondblclick="stor();" src="IMAGES/ehw_logo3.png" style="width: 90px;display: block;margin-left: auto;margin-right: auto;margin-top: 20px" >
                </td>
                <td style="text-align: center" > <!-- log in -->

                    <table style="display: block;max-width: 450px;background-color: #ffffff;padding-left:4px;padding-right: 4px;padding-top: 12px;padding-bottom: 12px" >
                        <tr>
                            <td colspan="2" style="text-align: left;color: #22307c;font-family: Arial, sans-serif;font-size: 18px"  >
                                BELÉPÉS
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 40%;text-align: right">Név:</td>
                            <td style="width: 59%;text-align: left" ><input type="text" id="neve" ></td>
                        </tr>
                        <tr>
                            <td style="text-align: right" >Jelszó:</td>
                            <td style="text-align: left" ><input type="password" id="jelszava" onkeyup="isEnter(event, 1);" ></td>
                        </tr>
                        <tr>
                            <td  style="text-align: right" >
                                <label for="rememberMe" >Jegyezzen meg</label>
                            </td>
                            <td style="text-align: left" >
                                <input id="rememberMe" type="checkbox">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="width: 450px" ><span id="uzenet" >-</span></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;padding-bottom: 16px" >
                                <div style="display: inline-block;background-color: #1a2d5c;color:#ffffff;vertical-align: top;font-size: 0" class="loginButt" onclick="sendInfo(1)" ><span style="font-size: 14px" >BELÉPÉS</span></div>
                            </td>
                        </tr>
                        <tr >
                            <td colspan="4">
                                <hr style="color: #22307c" >
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align: center;padding-top: 12px" >
                                <table style="width: 442px;background-color: #ffffff" cellspacing="0" cellpadding="0" >
                                    <tr style="cursor: pointer" >
                                        <td onclick="regi(0)" style="height: 26px" ><div style="display: block;width: 26px;height: 26px;background-color: #22307c;color: #fff81c;font-weight: bold;line-height: 26px" >+</div></td>
                                        <td style="width: 199px;background-color: #dedede;text-align: center;margin-right: 4px" onclick="regi(0)" >
                                             új fiók
                                        </td>
                                        <td onclick="regi(1)">
                                            <div style="display: block;width: 26px;height: 26px;background-color: #22307c;margin-left: 4px;color: #fff81c;font-weight: bold;line-height: 26px" >?</div>
                                        </td>
                                        <td style="width: 199px;background-color: #dedede;text-align: center" onclick="regi(1)">
                                            elfelejtett jelszó
                                        </td>
                                    </tr>
                                </table>


                            </td>
                        </tr>
                    </table>
                    <table style="display: none;max-width: 450px;background-color: #ffffff;padding-left:4px;padding-right: 4px;padding-top: 8px;padding-bottom: 12px" >
                        <tr>
                            <td style="cursor: pointer" onclick="openContact();" >Kapcsolat</td>
                        </tr>
                    </table>

                </td>
            </tr>
            <tr>
                <td> <!-- registration -->

                    <table id="regiTab" style="display: none;width: 100%;background-color: #c1cbc0;padding-top: 12px;padding-bottom: 12px">
                        <tr>
                            <td colspan="2">
                                ÚJ FIÓK LÉTREHOZÁSA
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Név:</td>
                            <td style="text-align: left" ><input type="text" id="userName" class="leftText" ></td>
                        </tr>
                        <tr>
                            <td style="text-align: right">E-mail:</td>
                            <td style="text-align: left"  ><input type="text" id="mailAdd" class="leftText" ></td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Csop:</td>
                            <td style="text-align: left"  >
                                <select id="groupSelector">
                                    <option value="gr1">Group 1</option>
                                    <option value="gr2">Group 2</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Jelszó:</td>
                            <td style="text-align: left" colspan="2" ><input type="password" id="pw1" class="leftText" ></td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Jelszó újra:</td>
                            <td style="text-align: left" ><input type="password" id="pw2" class="leftText" onkeyup="matchMail(this)" ><span id="ano" >NO</span></td>

                        </tr>
                        <tr>
                            <td style="text-align: right;vertical-align: top" ><input id="mailNotif" type="checkbox" ></td>
                            <td>Kapjak e-mailt, amikor<br> új házi érkezik.</td>
                        </tr>
                        <tr>
                            <td style="text-align: right;vertical-align: top" ><input id="mailNotif2" type="checkbox" ></td>
                            <td>Kapjak e-mailt, amikor<br> kijavított házi érkezik.</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="width: 100%;text-align: center" >
                                <table style="width: 450px">
                                    <tr>
                                        <td>
                                            <div style="text-align: center;margin-top: 16px" id="messages" >-</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                             <button class="loginButt" onclick="sendInfo(0);" >REGISZTRÁLOK</button>
                                        </td>
                                    </tr>
                                </table>

                            </td>
                        </tr>
                    </table>

                </td>
            </tr>



            <tr>
                <td>

                    <table id="elfTab" style="display: none;padding: 12px;background-color: #a8cf6b">
                        <tr>
                            <td colspan="2">Elfelejtett jelszó</td>
                        </tr>
                        <tr>
                            <td>E-mail címe:</td>
                            <td><input type="text" id="forgotEmail" > </td>
                        </tr>
                        <tr>
                            <td colspan="2" ><span id="uzi"></span></td>
                        </tr>
                        <tr>
                            <td colspan="2" ><div style="text-align: center;margin-top: 16px" > <span class="sendButt" onclick="sendInfo(3);" >SEND</span> </div></td>
                        </tr>
                    </table>

                </td>
            </tr>
            <tr>
                <td>
                    <table id="mailTab" style="display: none;padding: 12px;background-color: #dde9ff;width: 100%">
                        <tr>
                            <td colspan="2">Küldjön e-mailt</td>
                        </tr>
                        <tr>
                            <td>Az Ön e-mail címe:</td>
                        </tr>
                        <tr>
                            <td><input type="text" id="userEmail" style="width: 200px" > </td>
                        </tr>
                        <tr>
                            <td colspan="2" ><div >
                                <textarea id="messContent" style="width: 80%" ></textarea>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" ><span id="uziMail"></span></td>
                        </tr>
                        <tr>
                            <td>
                                <div id="acap"></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" ><div style="text-align: center;margin-top: 16px" > <span class="sendButt" onclick="sendMeMail();" >SEND</span> </div></td>
                        </tr>
                    </table>
                </td>
            </tr>

        </table>
    </div>

    </div><!-- nagyKeretKeret end -->
    </div><!-- centering end -->
</div>

<script src="SCRIPT/gramSender.js?updated=20180525"></script>
<script src="SCRIPT/gems.js?updated=1492974572411"></script>
</body>
</html>
