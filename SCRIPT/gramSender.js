/**
 * Created by telaw on 2017. 12. 23..
 */

var globFeladatPath;
var globFeladatID;
var tipusColors = ["#5a9ddd", "#69c879", "#eb44ae", "#fff300", "#557755", "#666666", "#5894ab"];

var globLang = {};
var globNyelv = 1;





function changeLanguage(nn)
{
    globNyelv = nn;
    manageLang();
    setStorage("lang", nn);
}

function manageLang()
{
        if(globNyelv == 0)
        {
            var hunga = {};
            hunga.belepve = "Üdv, ";
            hunga.ujhazi = "ÚJ HÁZI";
            hunga.beadott = "BEADOTT HÁZI";
            hunga.kijav = "KIJAVÍTOTT HÁZI";
            hunga.beadom = "BEADOM ELLENŐRZÉSRE";
            hunga.next = "KÖV.";
            hunga.backto = "ELŐ.";
            hunga.nonext = "Nincs több oldal.";
            hunga.noback = "Nincs előző oldal.";
            hunga.newtasks = "ÚJ FELADATOK";
            hunga.waiting = "KIJAVÍTÁSRA VÁRNAK";
            hunga.javitva = "KIJAVÍTOTT HÁZIK";
            hunga.kistext0 = "Úgy tűnik, még nem kaptál házit. Egyelőre lazíthatsz, de biztos, hogy hamarosan kapsz feladatokat.";
            hunga.kistext1 = "A beadott házikat már a kijavítottak között találod meg.";
            hunga.kistext2 = "Úgy tűnik, a tanár még nem javította ki a házidat. Türelem, hanarosan meglesz.";
            hunga.kistext3 = "Még nincs kijavított házid. Ha adtál be házit, akkor azt hamarosan kijavítja a tanár. Csak türelem.";
            hunga.assdate = "KIADVA";
            hunga.submDate = "BEADVA";
            hunga.noSub = "NINCS BEADVA";
            hunga.corrDate = "KIJAVÍTVA";
            hunga.chosWord = "Kiválasztott szó: ";
            hunga.notSelyet = "Még nem választott szót. Klikkeljen egy szóra, és csak utána a mondatokra.";
            hunga.notComplete = "Nem egészítette ki az összes mondatot. Így is beadja?";
            hunga.alreadySubmitted = "Ezt a feladatot már beadtad.";
            hunga.remark = "megj.";
            hunga.notSubYet = "Úgy tűnik, még nem adtál be házi feladatot";
            hunga.nohwyet = "Egyelőre nem kaptál új házikat. A tanár hamarosan küld neked.";
            hunga.gotyet = "Üdv az ehw-nál. Kaptál már házit? Kattints a ";
            hunga.gotyet3 = "ÚJ HÁZI";
            hunga.gotyet2 = "menüpontra, hogy kiderüljön!";
            hunga.loading = "Küldés...";
            hunga.kilepes = ["KI INNEN", "KILÉPÉS", "TÁVOZOM", "HÚZOK INNEN", "EBBŐL ELÉG", "LELÉPNÉK"];

            hunga.maci = "Maci";
            hunga.roka = "Róka";
            hunga.owl = "Bagoly";
            hunga.youracc = "FIÓKOD:";
            hunga.named = "NÉV:";
            hunga.subHw = "BEADOTT HÁZIK SZÁMA:";
            hunga.results = "EREDMÉNYEK:";
            hunga.delacc = "(törlöm a fiókomat)";
            hunga.del = "TÖRLÉS";
            hunga.delWait = "Előkészítés. Egy pillanat...";
            hunga.finalDel = "Fiókját véglegesen töröljük. Adatai örökre elvesznek. Mehet?";
            hunga.cancelit = "MÉGSE";
            hunga.realDel = "TÖRLÉS";
            hunga.opndate = "MEGNYITVA:";
            hunga.mailadd = "E-MAIL CÍM:";
            hunga.show = "(megmutat)";
            hunga.modif = " (csere)";
            hunga.changMail = "E-mail cím megváltoztatása:";
            hunga.newMail = "Az új e-mail cím:";
            hunga.send = "KÜLDÉS";
            hunga.tooshort = "Az e-mail cím túl rövid.";

            hunga.mailsucc = "E-mail címéte sikeresen megváltoztattuk.";
            hunga.mailfail = "E-mail címét nem sikerült megváltoztatni.";
            hunga.mailbad = "Érvénytelen e-mail cím.";
            hunga.mailno = "Nem adott meg e-mail címet.";
            hunga.nopw = "Rossz jelszó.";
            hunga.noname = "Rossz felhasználónév.";
            hunga.moding = "Módosítás...";
            hunga.usedby = "Ez az a-mail cím már használatban van.";

            hunga.changPassw = "Jelszó megváltoztatása:";
            hunga.changPw = "(jelszóváltás)";
            hunga.ujpw = "Az új jelszó:";
            hunga.confirm = "Megerősítés:";
            hunga.pwsuccess = "Jelszavát sikeresen megváltoztattuk.";
            hunga.pwfail = "A jelszót nem sikerült megváltoztatni.";
            hunga.getNotif = "Kapjak e-mailt, amikor új házi érkezik.";
            hunga.getNotif2 = "Kapjak e-mailt a kijavított háziról.";

            hunga.nomeaning = "Jelentés nincs megadva.";
            hunga.noanswer = "nem válaszolt";
            hunga.clickWord = "Kattintson a szóra a jelentésért.";
            hunga.nextTasked = "köv.";
            hunga.examples = "Példák:";
            hunga.logoutandin = "Lejárt a munkamenet. Lépjen ki, majd lépjen be újra.";
            hunga.errNotSubmitted = "Hiba: a házit nem sikerült beadni. Lépjen ki, majd lépjen be újra.";
            hunga.ment = "MENTÉS";
            hunga.realDelete = "Tényleg törölni szeretné a fiókját?";

            hunga.loggedOut = "Sikeres kijelentkezés.";
            hunga.logInAgain = "Lépjen be újra.";
            hunga.del2 = "törlés";
            hunga.redohw = "újra megoldom";

            hunga.directUser = "Klikkeljen a beírt megoldásra. A kinyíló ablakban a tanár megjegyzése is olvasható.";
            hunga.sessover = "Nyugi, csak lejárt a munkamenet. Lépj be újra.";

            globLang = hunga;
          //  return hunga[att];

        }
        else
        {

           var angol = {};
            angol.belepve = "Hi, ";
            angol.ujhazi = "NEW HOMEWORK";
            angol.beadott = "SUBMITTED HW";
            angol.kijav = "CORRECTED HW";
            angol.beadom = "SUBMIT THIS TASK";
            angol.next = "NEXT";
            angol.backto = "BACK";
            angol.nonext = "No more pages.";
            angol.noback = "No previous page.";
            angol.newtasks = "NEW TASKS";
            angol.waiting = "WAITING TO BE CORRECTED";
            angol.javitva = "CORRECTED TASKS";
            angol.kistext0 = "It seems you have not been assigned any homework yet. You can sit back and relax. However, the teacher will soon give you some homework.";
            angol.kistext1 = "You can find your submitted homework under the CORRECTED HW menu point.";
            angol.kistext2 = "It seems the teacher has not corrected your homework. Be patient, the teacher will correct it soon.";
            angol.kistext3 = "You have no corrected homework. If you have submitted any homework, the teacher will correct it soon. Be patient.";
            angol.assdate = "ASSIGNED";
            angol.submDate = "SUBMITTED";
            angol.noSub = "NOT SUBMITTED";
            angol.corrDate = "CORRECTED";
            angol.chosWord = "Chosen word: ";
            angol.notSelyet = "You have not selected a word. First, click on a word and after that on a sentence.";
            angol.notComplete = "You have not filled in all the gaps! Would you like to submit this task anyway?";
            angol.alreadySubmitted = "You have already submitted this task.";
            angol.remark = "rem.";
            angol.notSubYet = "It seems you have not submitted any homework yet.";
            angol.nohwyet = "You don't have any homework to do now. The teacher will send you something soon.";
            angol.gotyet = "Welcome to ehw. Have you got any homework yet? Click on ";
            angol.gotyet3 = "NEW HOMEWORK";
            angol.gotyet2 = "to find out.";
            angol.loading = "Sending...";
            angol.kilepes = ["GET OUTTA HERE", "SIGN OUT", "I'M LEAVING", "LET ME OUT", "ENOUGH OF THIS", "NEED SOME FRESH AIR"];

            angol.maci = "Bear";
            angol.roka = "Fox";
            angol.owl = "Owl";
            angol.youracc = "YOUR ACCOUNT:";
            angol.named = "NAME:";
            angol.subHw = "SUBMITTED HOMEWORK:";
            angol.results = "BADGES:";
            angol.delacc = "(delete my account)";
            angol.del = "DELETE";
            angol.delWait = "Preparing. Patience...";
            angol.finalDel = "Your account will be deleted irrevocably. Your data will be lost forever. Go?";
            angol.cancelit = "CANCEL";
            angol.realDel = "DELETE";
            angol.opndate = "OPENED:";
            angol.mailadd = "E-MAIL ADDRESS:";
            angol.show = "(reveal)";
            angol.modif = " (modify)";
            angol.changMail = "Change your e-mail address:";
            angol.newMail = "Your new e-mail address:";
            angol.send = "SEND";
            angol.tooshort = "The e-mail address is too short.";

            angol.mailsucc = "Your e-mail address has been changed successfully.";
            angol.mailfail = "Error: we couldn not change your e-mail address.";
            angol.mailbad = "Error: bad e-mail address.";
            angol.mailno = "Error: no e-mail address was given.";
            angol.nopw = "Error: bad password.";
            angol.noname = "Error: bad user name.";
            angol.moding = "Modifying...";
            angol.usedby = "This mail address is already in use.";

            angol.changPassw = "Change your password:";
            angol.changPw = "(change password)";
            angol.ujpw = "Your new password:";
            angol.confirm = "Confirm:";
            angol.pwsuccess = "Your password has been changed successfully.";
            angol.pwfail = "Error: we could not change your password.";
            angol.getNotif = "Get e-mail when new homework is assigned to me.";
            angol.getNotif2 = "Get e-mail when my homework is corrected.";

            angol.nomeaning = "No meaning was given.";
            angol.noanswer = "no answer provided";
            angol.clickWord = "Click on the word the get the meaning.";
            angol.nextTasked = "next";
            angol.examples = "Examples:";
            angol.logoutandin = "Session is over. Log out and then log in again.";
            angol.errNotSubmitted = "ERROR: homework was not submitted. Log out and then log in again.";
            angol.ment = "SAVE";
            angol.realDelete = "Do you really want to delete your account?";

            angol.loggedOut = "You are logged out.";
            angol.logInAgain = "Please, log in again.";
            angol.del2 = "delete";
            angol.redohw = "redo this";

            angol.directUser = "Click on the solution you wrote in. The pop-up contains your teacher's remark, too.";

            angol.sessover = "Don't worry. It's just session is up. Log in again.";

            globLang = angol;
          //  return angol[att];

        }




        fillLanguage();





}

function fillLanguage()
{


    var belep = document.getElementById("belep");

    if(belep != null)
    {
        belep.innerHTML = globLang.belepve;
    }

    var ujhome = document.getElementById("ujhw");
    if(ujhome != null)
    {
        ujhome.innerHTML = globLang.ujhazi;
    }

    var beadhome = document.getElementById("beadhazi");
    if(beadhome != null)
    {
        beadhome.innerHTML = globLang.beadott;
    }

    var kijahome = document.getElementById("kijavhazi");
    if(kijahome != null)
    {
        kijahome.innerHTML = globLang.kijav;
    }


    //   manage BACK NEXT butts

    var nextGomb = document.getElementById("nextButt");
    if(nextGomb != null)
    {
        nextGomb.innerHTML = globLang.next;
    }

    var backGomb = document.getElementById("backButt");
    if(backGomb != null)
    {
        backGomb.innerHTML = globLang.backto;
    }

    var beadGombo = document.getElementById("beadGomb");
    if(beadGombo != null)
    {
        var curPa = hwobj.assigned.findIndex(function(x) {if(x.id == globFeladatID){ return true }});
        if(curPa != -1)
        {
            // NOT SUBMITTED YET
            beadGombo.innerHTML = globLang.beadom;
        }
        else
        {
            beadGombo.innerHTML = globLang.submDate;
        }


    }

    var kist0 = document.getElementById("smallText0");
    if(kist0 != null)
    {
        kist0.innerHTML = globLang.kistext0;
    }

    var kist1 = document.getElementById("smallText1");
    if(kist1 != null)
    {
        kist1.innerHTML = globLang.kistext1;
    }


    var kist2 = document.getElementById("smallText2");
    if(kist2 != null)
    {
        kist2.innerHTML = globLang.kistext2;
    }


    var kist3 = document.getElementById("smallText3");
    if(kist3 != null)
    {
        kist3.innerHTML = globLang.kistext3;
    }

    var ujT = document.getElementById("ujTasks");
    if(ujT != null)
    {
        ujT.innerHTML = globLang.newtasks;
    }

    var varakoz = document.getElementById("waitingel");
    if(varakoz != null)
    {
        varakoz.innerHTML = globLang.waiting;
    }

    var kijavi = document.getElementById("kijavitott");
    if(kijavi != null)
    {
        kijavi.innerHTML = globLang.javitva;
    }

    var assDate = document.getElementById("ujTaskDate");
    if(assDate != null)
    {
        assDate.innerHTML = globLang.assdate;
    }

    var subDate = document.getElementById("subDate");
    if(subDate != null)
    {
        subDate.innerHTML = globLang.submDate;
    }

    var corDate = document.getElementById("corDa");
    if(corDate != null)
    {
        corDate.innerHTML = globLang.corrDate;
    }

    var chWord = document.getElementById("chWord");
    if(chWord != null)
    {
        chWord.innerHTML = globLang.chosWord;
    }

    var subBut = document.getElementById("alreadySub");
    if(subBut != null)
    {
        subBut.innerHTML = globLang.submDate;
    }

    var nosuby = document.getElementById("notSubmitYet");
    if(nosuby != null)
    {
        nosuby.innerHTML = globLang.notSubYet;
    }

    var nohyet = document.getElementById("nohwyetdiv");
    if(nohyet != null)
    {
        nohyet.innerHTML = globLang.nohwyet;
    }

    var welc1 = document.getElementById("welcome1");
    if(welc1 != null)
    {
        welc1.innerHTML = globLang.gotyet;
    }

    var welc2 = document.getElementById("welcome2");
    if(welc2 != null)
    {
        welc2.innerHTML = globLang.gotyet2;
    }

    var beadvasor = document.getElementById("subCovInner");
    if(beadvasor != null)
    {
        var kovSpan = "<span class='nextTask' onclick='ujHwNext(1)' >" + globLang.nextTasked + "</span>";
        beadvasor.innerHTML = globLang.submDate + kovSpan;
    }

    var akilep = document.getElementById("kilep");
    if(akilep != null)
    {
        var ho = globLang.kilepes.length;
        var randi = Math.floor((Math.random() * ho));
        akilep.innerHTML = globLang.kilepes[randi];
    }

    var examDi = document.getElementById("exampleDiv");
    if(examDi != null)
    {
        examDi.innerHTML = globLang.examples;
    }

    // get ACCOUNT

    var macko = document.getElementById("macitd");

    var elemNames = ["macitd", "rokatd", "owltd", "usntd", "submtd", "opendatetd", "not1td", "not2td", "emailtd",
    "pwchtd", "ujmaildiv", "ujpwdiv", "pwconf", "mailMent", "resultsDiv", "delAccDiv", "waitdiv", "finalDelDiv", "mailChSpan", "chMailDiv", "mailCover", "accCim"
  ];
    var langProps = ["maci", "roka", "owl", "named", "subHw", "opndate", "getNotif", "getNotif2", "mailadd", "changPw", "newMail",
  "ujpw", "confirm", "ment", "results", "delacc", "delWait", "finalDel", "ment", "changMail", "show", "youracc"];
//  alert(elemNames.length + " " + langProps.length);
    for(var z = 0;z<elemNames.length;z++)
    {
      var azeleme = document.getElementById(elemNames[z]);
      if(azeleme != null)
      {
        azeleme.innerHTML = globLang[langProps[z]];
      }
    }

}
function setStorage(key, value)
{
    if (typeof(Storage) !== "undefined") {
        // Store
        localStorage.setItem(key, value);
        // Retrieve
        //  document.getElementById("result").innerHTML = localStorage.getItem("lastname");
    } else {
        alert("Your browser does not support this feature.");
    }
}

function getStorage(key)
{
    if (typeof(Storage) !== "undefined") {

        return localStorage.getItem(key);
    } else {
        alert("Your browser does not support this feature.");
    }
}

function closePopUp() {
    document.getElementById("fullCover").style.display = "none";
}

function sendInfo(cod, notif)
{
    if(cod === 0)
    {


        var userNev = document.getElementById("userName").value.trim();
        var emailAdd = document.getElementById("mailAdd").value.trim();

        var e = document.getElementById("groupSelector");
        var groupTo = e.options[e.selectedIndex].value;

        var pass1 = document.getElementById("pw1").value.trim();
        var pass2 = document.getElementById("pw2").value.trim();

        var mailNoti = document.getElementById("mailNotif").checked;

        var mailNoti2 = document.getElementById("mailNotif2").checked;

        var kuld = "user=" + userNev + "&amail=" + emailAdd + "&group1=" + groupTo + "&pw=" + pass1 + "&mailNoti=" + mailNoti + "&mailNoti2=" + mailNoti2 + "&code=" + "0"; // code 0 registration

        if(pass1 != pass2)
        {
            alert("A két jelszó nem egyezik!");
            return;
        }
    }
    else if(cod === 1)
    {

        userNev = document.getElementById("neve").value.trim();
        pass1 = document.getElementById("jelszava").value.trim();


        kuld = "user=" + userNev + "&pw=" + pass1 + "&code=" + "1"; // code 1 BEJELENTEKZÉS

    }
    else if(cod === 99) // sign in from pop up
    {
        var userN = document.getElementById("popUpName").value.trim();
        var userP = document.getElementById("popUpPass").value.trim();

        kuld = "user=" + userN + "&pw=" + userP + "&code=" + "1"; // code 1 BEJELENTEKZÉS POP UP
    }
    else if(cod === 2) // LOG OUT
    {

        userNev = document.getElementById("inName").value.trim();
        pass1 = document.getElementById("inPass").value.trim();
        kuld = "user=" + userNev + "&pw=" + pass1 + "&code=" + "2"; // code 2 KIJELENTKEZÉS

    }
    else if(cod === 3) // forgotten password
    {
        var mailTo = document.getElementById("forgotEmail").value.trim();

        kuld = "amail=" + mailTo + "&code=" + "3";

    }
    else if(cod === 4) // UJ PASSWORD
    {
        document.getElementById("uzi4").innerHTML = globLang.moding;

        var pw1 = document.getElementById("newPassword1").value.trim();
        var pw2 = document.getElementById("newPassword2").value.trim();

        if(pw1 !== pw2)
        {
            alert("A két jelszó nem egyezik.");
            return;
        }



        userNev = document.getElementById("inName").value.trim();
        var pass1_regi = document.getElementById("inPass").value.trim();
        var ujPw = document.getElementById("newPassword1").value.trim();

        if(ujPw.length < 8)
        {
            alert("Túl rövid a jelszó. Min. 8 karakter kell.");
            return;
        }

        kuld = "user=" + userNev + "&oldpw=" + pass1_regi + "&ujpw=" + ujPw + "&code=" + "4";

    }
    else if(cod === 5) // ÚJ E-MAIL
    {
        document.getElementById("systemMessage1").innerHTML = globLang.moding;
        var ujMail = document.getElementById("ujEmail").value.trim();

        userNev = document.getElementById("inName").value.trim();
        pass1 = document.getElementById("inPass").value.trim();

        kuld = "user=" + userNev + "&pw=" + pass1 + "&ujmail=" + ujMail + "&code=" + "5"; // code 5 CHANGE E-MAIL ADDRESS
    }
    else if(cod === 6) // GET E-MAIL WHEN NEW HW IS ASSIGNED?
    {
        userNev = document.getElementById("inName").value.trim();
        pass1 = document.getElementById("inPass").value.trim();

        kuld = "user=" + userNev + "&pw=" + pass1 + "&notify=" + notif + "&code=" + "6"; // code 6 CHANGE notif
    }
    else if(cod === 7) // GET E-MAIL WHEN HW IS CORRECTED BY THEACHER
    {
        userNev = document.getElementById("inName").value.trim();
        pass1 = document.getElementById("inPass").value.trim();

        kuld = "user=" + userNev + "&pw=" + pass1 + "&notify=" + notif + "&code=" + "7"; // code 6 CHANGE notif
    }



    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {


            // uzenet(this.responseText);
            var valasz = this.responseText;

            if(cod === 0) // regisztráció
            {
                document.getElementById("messages").innerHTML = this.responseText;
            }
            else if(cod === 1) // Bejelentkezés
            {

                var resze = valasz.split('+'); // resze[1] a tempid

                if(resze[0] === "0") // SIKERES BEJELENTKEZÉS
                {

                    var rememberCB = document.getElementById("rememberMe");
                    if(rememberCB.checked)
                    {
                        userNev = document.getElementById("neve").value.trim();
                        pass1 = document.getElementById("jelszava").value.trim();
                        setStorage('usname', userNev);
                        setStorage('pw', pass1);

                    }
                    document.getElementById("uzenet").innerHTML = "Sikeres bejelentkezés.";
                    document.getElementById("tempida").value = resze[1];

                    document.getElementById("usNamein").innerHTML = resze[2];

                    document.getElementById("inName").value = userNev;
                    document.getElementById("inPass").value = pass1;
                    //fillLanguage();
                    manageLang();

                    document.getElementById("wrapper_login").style.display = "none";
                    document.getElementById("workTop1").innerHTML = "<div class='keretDiv' style='background-color: #ffffff;padding: 36px'  ><span id='welcome1'>" +  globLang.gotyet  + "</span><span style='cursor: pointer' onclick='getHomeW();' >" + globLang.ujhazi + " </span><span id='welcome2'>" + globLang.gotyet2 + "</span></div>";
                    document.getElementById("wrapper1").style.display = "block";
                    dealMenuButt();
                    updateHomework(10); // ask for homework status

                    if(userNev === "Imre")
                    {
                        document.getElementById("vocgem").style.visibility = "visible";
                    }
                    else
                    {
                        document.getElementById("vocgem").style.visibility = "hidden";
                    }

                }
                else // SIKERTELEN!!!
                {
                    alert("Sikertelen bejelentkezés");
                    document.getElementById("uzenet").innerHTML = "Sikertelen bejelentkezés.";
                    document.getElementById("tempida").value = "0";
                    document.getElementById("inName").value = "0";
                    document.getElementById("inPass").value = "0";
                }

            }
            else if(cod === 99) // BEJELENTKEZÉS POP UP RÓL
            {
                var resze = valasz.split('+'); // resze[1] a tempid

                if(resze[0] === "0") // SIKERES BEJELENTKEZÉS POP UP RÓL
                {
                    document.getElementById("tempida").value = resze[1];

                    document.getElementById("usNamein").innerHTML = resze[2];

                    document.getElementById("inName").value = userN;
                    document.getElementById("inPass").value = userP;

                    document.getElementById("fullCover").style.display = "none";
                    var submitCover = document.getElementById("submitCover");
                    if(submitCover !== null)
                    {
                        submitCover.style.height = "0";
                        submitCover.style.backgroundColor = "#78c17e7a";
                        var submitBele = document.getElementById("subCovInner");
                        if(submitBele !== null)
                        {
                            submitBele.style.height = "0";
                        }
                        document.getElementById("beadText").innerHTML = globLang.submDate; // beadva
                        document.getElementById("nextGo").innerHTML = globLang.nextTasked; // next

                        document.getElementById("beadGomb").innerHTML = globLang.beadom; // submit butt text
                    }

                }
                else
                {
                    document.getElementById("popUpMessage").innerHTML = "Sikertelen bejelentkezés.";
                }
            }
            else if(cod === 2) // kijelentkezés SIKERES???
            {

                resze = valasz.split('+'); // resze[1] a tempid
               // alert(resze);
                if(resze[0] == 3) // sikeres log out
                {
                    toLogOut(globLang.loggedOut);

                }

            }
            else if(cod === 3) // forgotten EMAIL
            {

                document.getElementById("uzi").innerHTML = valasz;
            }
            else if(cod === 4) // change password
            {
                if(valasz === "0")
                {
                    document.getElementById("inPass").value = ujPw;
                    document.getElementById("uzi4").innerHTML = globLang.pwsuccess;
                    setStorage('pw', pw1);
                }
                else
                {
                    document.getElementById("uzi4").innerHTML = globLang.pwfail;
                }

            }
            else if(cod === 5)
            {
               // alert(valasz);

                var messDiv = document.getElementById("systemMessage1");
                if(valasz == '0') // success
                {
                    document.getElementById("accMailAdd").innerHTML = document.getElementById("ujEmail").value;
                    messDiv.innerHTML = globLang.mailsucc;
                }
                else if(valasz == '1')
                {
                    messDiv.innerHTML = globLang.usedby;
                }
                else if(valasz == '2')
                {
                    messDiv.innerHTML = globLang.mailfail;
                }
                else if(valasz == '3')
                {
                    messDiv.innerHTML = globLang.mailbad;
                }

            }
            else if(cod === 6)
            {
                document.getElementById("notifLoader").style.visibility = "hidden";
                var acb2 = document.getElementById("notifC");
                if(valasz === "true")
                {
                    acb2.checked = true;
                }
                else
                {
                    acb2.checked = false;
                }
            }
            else if(cod === 7)
            {
                document.getElementById("notifLoader2").style.visibility = "hidden";
                var acb = document.getElementById("notifCB2");
                if(valasz === "true")
                {
                    acb.checked = true;
                }
                else
                {
                    acb.checked = false;
                }
            }

        }
    };

    xhttp.open("POST", "MAJAXOK/ajaxRegist.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(kuld);

}

function toLogOut(message)
{
    document.getElementById("uzenet").innerHTML = message;
    document.getElementById("tempida").value = "0";

    document.getElementById("inName").value = "0";
    document.getElementById("inPass").value = "0";

    document.getElementById("wrapper1").style.display = "none";
    document.getElementById("wrapper_login").style.display = "block";
}


function clearWorkTop()
{
  //  document.getElementById("changeEmail").style.display = "none";
  //  document.getElementById("changePassword").style.display = "none";
}

function getHomeW()
{
    // Click from a text, make menupont UJ HAZI yellow
    dealMenuButt();
    document.getElementById("ujHaziButt").style.color = "#ffff00";
    getHomework(null);
}

function dealMenuButt()
{
    /*
    var allButts = document.getElementsByClassName("menuButt");
    for(var i = 0;i<allButts.length;i++)
    {
        allButts[i].style.color = "#eeeeee";
    }
    */
    document.getElementById("kijavhazi").style.color = "#eeeeee";
    document.getElementById("beadhazi").style.color = "#eeeeee";
    document.getElementById("ujhw").style.color = "#eeeeee";

}


function giveOldHwDas()
{
    var apages = getOldPage();

    return "<table class='dashBoartTable'><tr> <td><span class='dashBoNumber' id='pages'>" + apages[0] + "/" + apages[1] +  "</span></td> <td style='text-align: right' ><span id='backButt' class='dashBoardButt1' onclick='oldHwNext(-1)' >" + globLang.backto + "</span><span id='nextButt' onclick='oldHwNext(1)' class='dashBoardButt2' >" + globLang.next + "</span></td> </tr></table>";

}

function giveSubDas()
{
    // dashboard for submitted HW
    var ss = hwobj.submitted.findIndex(function(x) { if(x.id == globFeladatID ){return true}  } );


    if(ss != -1) {
        var max = hwobj.submitted.length;
        return "<table class='dashBoartTable'><tr> <td><span class='dashBoNumber' id='pages'>" + parseInt(ss + 1) + "/" + max + "</span></td> <td style='text-align: right' ><span id='backButt'  class='dashBoardButt1' onclick='subHwNext(-1, true)' >" + globLang.backto + "</span><span id='nextButt' onclick='subHwNext(1, true)' class='dashBoardButt2' >" + globLang.next + "</span></td> </tr></table>";
    }

}

function giveNewHwDas()
{
    var pages = getPage();
    return "<table class='dashBoartTable'><tr> <td><span class='dashBoNumber' id='pages'>" + pages[0] + "/" + pages[1] + "</span></td> <td style='text-align: right' ><span id='backButt'  class='dashBoardButt1' onclick='ujHwNext(-1, true)' >" + globLang.backto + "</span><span id='nextButt' onclick='ujHwNext(1, true)' class='dashBoardButt2' >" + globLang.next + "</span></td> </tr></table>";

}


function getHomework(azel) // click on ÚJ HÁZI
{

    if(azel != null)
    {
        dealMenuButt();
        azel.style.color = "#ffff00";
    }
    document.getElementById("ujhw").style.color = "#ffff00";
  //  clearWorkTop();
//  putinLoader();
    var ujhw = hwobj.assigned;
    if(ujhw != null)
    {
        var bele = "";
        for(var i = 0;i<ujhw.length;i++)
        {
            bele = bele + "<div onclick='hwClick(this);' class='taskPoint' ><span style='width: 8px;height: 8px;background-color:" + tipusColors[ujhw[i].tipus] + ";display: inline-block' ></span><span style='padding: 4px;margin: 4px' class='apath' >" + ujhw[i].atitle + "</span>" + "<span style='display: none' class='uniqid'>" + ujhw[i].id + "</span><span style='float: right' >" + ujhw[i].date1 +"</span></div>";
        }
        if(ujhw.length == 0)
        {
            bele = "<div id='nohwyetdiv' style='margin-left: 36px;margin-right: 36px;padding-top: 36px;padding-bottom: 36px' >" + globLang.nohwyet + "</div>";
        }
        var korul = "<div style='width:100%;background-color:#ffffff;padding-top: 36px;padding-bottom: 36px'><div class='kisCimSor' ><span id='ujTasks' class='kisCim' >" + globLang.newtasks + "</span><span id='ujTaskDate' class='kisCim' style='float: right' >" + globLang.assdate + "</span></div>" + bele + "</div>";
        document.getElementById("workTop1").innerHTML = "<div class='keretDiv'>" + korul + "</div>";
    }
    else
    {
        document.getElementById("workTop1").innerHTML = "<div class='keretDiv'> <div id='smallText0' style='padding: 36px;background-color: #ffffff' >" + globLang.kistext0 + "</div></div>";
    }
}

function hwClick(ele)
{
    // GETS THE NEW TASK FILE AND SHOWS IT TO USER
    var kid = ele.getElementsByClassName("uniqid");
    var azid = kid[0].innerHTML;
    globFeladatID = kid[0].innerHTML;
   // document.getElementById("tester").innerHTML = "hwClick " +  globFeladatID;
    var kellPath = "";
    var tipusa;

    var idindex = hwobj.assigned.findIndex(function(x) {if(x.id == azid){ return true }});
    kellPath = hwobj.assigned[idindex].apath;
    tipusa = hwobj.assigned[idindex].tipus;
    GLOBREDO = hwobj.assigned[idindex].redo;
    if(kellPath == "")
    {
        alert("Error, no path.");
        return;
    }

  // alert(kellPath);
   // kid = ele.getElementsByClassName("apath");
    if(tipusa == "0")
    {
        //mytest(kellPath); // just the path
        getTheFileVonal(kellPath, procMcGram);
    }
    else if(tipusa == "1")
    {
       // alert("hwClick: Ez vonalas kitöltős");
        getTheFileVonal(kellPath, procVonal);
    }
    else if(tipusa == "3")
    {
        getTheFileVonal(kellPath, procVocab);
    }
    else if(tipusa == "2")
    {
        getTheFileVonal(kellPath, procABCgrammar);
    }
    else if(tipusa == "5")
    {
        getTheFileVonal(kellPath, procGram5uj);
    }
    else if(tipusa == "6")
    {
        getTheFileVonal(kellPath, procGram6);
    }
    else
    {
        alert("No type specified.");
    }


}

var GLOBREDO = "no";

var procGram6 = function(inpu)
{
    globObj = JSON.parse(inpu);
    var cime =  globObj.title;
    glogTaskCim = cime;

    var inst = textDeco(globObj.instructions);

    var contents = globObj.contents;



    var longS = "";
    for(var i = 0;i<contents.length;i++)
    {
        longS += "<tr><td>" + parseInt(i+1) + ".</td><td>" + contents[i].longsent + "</td></tr>";
        if(contents[i].starter.trim() != "")
        {
            longS += "<tr><td></td><td>" + contents[i].starter + "</td></tr>";
        }
        longS += "<tr><td></td><td><textarea class='texInp' onfocus='towhite(this);'  style='width: 100%;resize: none' id='" + i + "'  ></textarea></td></tr>";
    }


    var foTab = "<table class='taskTable' >" + longS + "</table>";


    var exaDiv = "<div class='exampDiv'><div class='exampGreen' id='exampleDiv' >" + globLang.examples + "</div><div>" + globObj.exa + "</div></div>";
    var submDiv = submitButton("submitGram5(6)");
    var acim = "<div  class='tabTitle' >" + cime + "</div>";



     inst = "<div  class='tabInstru'>" + inst + "</div>";
    var cimKer = "<div class='headFrame' >" + acim + inst + "</div>";

    var lev = null;
    if(typeof globObj.weight !== 'undefined')
    {
        lev = globObj.weight;
    }


    document.getElementById("workTop1").innerHTML = "<div id='coverMCgram' class='coverMCgram' style='background-color: #ffffff' >" + giveNewHwDas() + "<div style='position: relative' ><div id='submitCover' class='subCov'><div class='subCovBele' id='subCovInner' ><span id='beadText'>" + globLang.submDate + "</span><span id='nextGo' class='nextTask' onclick='ujHwNext(1)' >" + globLang.nextTasked + "</span></div></div><div style='margin-left: 36px;margin-right: 36px' >" + cimGauge(acim, inst, lev) + helperDiv(globObj) + "</div>" + exaDiv + "<table class='mondatTable' style='text-align: left;margin-top: 14px;padding-left: 36px;padding-right: 36px' id='montab' >" + foTab + "</table></div>" + submDiv + "</div>";

    animNewHw();

};

function helperDiv(obj)
{
    var bel = "";

    if(obj.helps && obj.helps != null)
    {
        if(obj.helps.length>0)
        {
            for(var h = 0;h<obj.helps.length;h++)
            {
                var nevL = obj.helps[h];
                if(nevL.trim() != "")
                {
                    bel = bel + "<span class='helpSpan' onclick='loadHelper(" + '"' + nevL + '"' + ", 0);' >h</span>";
                }

            }
        }

    }
    return helpDiv = "<div>" + bel + "</div>";
}

var procGram5uj = function(inpu)
{
    //alert(inpu);
    globObj = JSON.parse(inpu);
    var cime = globObj.title;
    glogTaskCim = cime;

    var inst = textDeco(globObj.instructions);

    var contents = globObj.contents;

    var awords = contents.words;
    var wordObj = [];
    for(var k = 0;k<awords.length;k++)
    {
        var wordp = {};
        wordp.word = awords[k];
        wordp.id = k;
        wordObj.push(wordp);
    }

    var customSort = function(a,b) {
        if (a.word < b.word) {
            return -1;
        }
        if (a.word > b.word) {
            return 1;
        }
    };

    wordObj.sort(customSort);



    var wordsdivs = "";
    for(var w = 0;w<wordObj.length;w++)
    {
        wordsdivs += "<div class='words' style='background-color: #dd0000' id='wordbox" + wordObj[w].id + "' >" + wordObj[w].word + "</div>";

    }
    var worddi = "<div style='padding-left:4px;padding-right: 4px;padding-top: 8px;padding-bottom: 8px ;background-color: #dcffff' >" + wordsdivs + "</div>";


    var wordf = contents.wordforms; // array

    var wordfor = "";
    for(var i = 0;i<wordf.length;i++)
    {
        wordfor += wordf[i] + " - ";
    }

    var atext = contents.text;

    var textsor = "";
    var stil = "style='border-style:none;border-bottom-style:solid;border-width:1px;padding-left:4px;padding-right:4px;text-align:center;font-weight:bold;color:#5588ff'";

    var numbered = false;

    if(atext.includes("#"))
    {
        numbered = true;
    }


    var tabSor = "";
    if(numbered) // we have to number the sentences line by line
    {
        var senti = atext.split("#");

        for(var t = 0;t<senti.length;t++)
        {

            var monDarab = senti[t].split("_");

            var mondsor = "";
            for(var m = 0;m<monDarab.length;m++)
            {
                var vonal = "<input class='texInp' " + stil + " id='" + t + m + "' type='text' onfocus='towhite(this);' onfocusout='checkMatchwords();'  >";
                if(m == monDarab.length -1)
                {
                    vonal = ""; // last input text not needed
                }
                mondsor += monDarab[m] + vonal;
            }
            tabSor += "<tr><td style='vertical-align: top' >" + parseInt(t+1) + ".</td><td>" + mondsor + "</td></tr>";
        }
    }
    else
    {

        var nagytext = atext.split("_");
        textsor = "";
        for(t = 0;t<nagytext.length;t++)
        {
            vonal = "<input class='texInp' " + stil + " id='" + t + "' type='text' onfocus='towhite(this);' onfocusout='checkMatchwords();'  >";
            if(t == nagytext.length -1)
            {
                vonal = ""; // last input text not needed
            }
            textsor += nagytext[t] + vonal;
        }

        tabSor = "<tr><td>" + textsor + "</td></tr>";

    }

    var lev = null;
    if(typeof globObj.weight !== 'undefined')
    {
        lev = globObj.weight;
    }

    var bel = "";
    if(globObj.helps && globObj.helps != null)
    {

        for(var h = 0;h<globObj.helps.length;h++)
        {
            var nevL = globObj.helps[h];
            if(nevL.trim() != "")
            {
                bel = bel + "<span class='helpSpan' onclick='loadHelper(" + '"' + nevL + '"' + ", 0);' >h</span>";
            }

        }
    }
    var helpDiv = "<div>" + bel + "</div>";

    var foTab = "<table class='mondatTable' id='montab' style='text-align: left;margin-top: 14px' >" + tabSor + "</table>";

    var submDiv = submitButton("submitGram5(5)");
    document.getElementById("workTop1").innerHTML = "<div id='coverMCgram' class='coverMCgram' style='background-color: #ffffff;' >" + giveNewHwDas() + "<div class='ujCover' style='position: relative'  ><div id='submitCover' class='subCov'><div class='subCovBele' id='subCovInner'><span id='beadText'>" + globLang.submDate + "</span><span id='nextGo' class='nextTask' onclick='ujHwNext(1)' >" + globLang.nextTasked + "</span></div></div><div style='padding-left: 36px;padding-right: 36px'  >" + cimGauge(glogTaskCim, inst, lev) + helpDiv + worddi + foTab + "</div></div>" + submDiv + "</div>";


    animNewHw();

};


function towhite(elem)
{
    elem.style.backgroundColor = "#ffffff";
}
function checkMatchwords()
{
   var wordforms = globObj.contents.wordforms;
    var oriwords = globObj.contents.words;

    var wordObj = [];
    for(var z = 0;z<wordforms.length;z++)
    {
        var wordpair = {};
        wordpair.id = z;
        wordpair.ori = oriwords[z];
        wordpair.formi = wordforms[z];
        wordObj.push(wordpair);
    }

   var beirtSzav = document.getElementsByClassName("texInp");
    var beirtszo = "";
    var mat = [];
    for(var i = 0;i<beirtSzav.length;i++)
    {
        beirtSzav[i].style.backgroundColor = "#ffffff";
        for(var k = 0;k<wordObj.length;k++)
        {
            var beirt = beirtSzav[i].value;
            if(beirt.indexOf(wordObj[k].formi) !== -1) // ha van match
            {
                mat.push(wordObj[k].id);
                break;
            }
        }
    }

    var allWords = document.getElementsByClassName("words");
    for(var i = 0;i<allWords.length;i++)
    {
      allWords[i].style.color= "#ffffff";
    }
    /* //it is a working solution more or less
    var mat2 = Array.prototype.map.call(beirtSzav, function(obj)
        {
            return Array.prototype.map.call(wordObj, function(obj2)
            {
                if(obj.value.indexOf(obj2.formi) !== -1)
                {
                    return obj2.id;
                }
            });

        }
    );
    */




    for(i=0;i<mat.length;i++)
    {
        document.getElementById("wordbox" + mat[i]).style.color = "#444444";
    }
    // addressBook.filter(startsWith.bind(this, wordToCompare));

  //  document.getElementById("wordinfo").innerHTML = sso;


}


var submitGram5 = function(atipe)
{
    var curPa = hwobj.assigned.findIndex(function(x) {if(x.id == globFeladatID){ return true }});

    if(atipe == 5)
    {
        var maxchar = 60;
    }
    if(atipe == 6)
    {
        maxchar = 150;
    }

    if(curPa != -1)
    {
        var toolong = false;
        hwobj.assigned[curPa].viewed = "yes";
        var allText = document.getElementsByClassName("texInp");
        var tippek = "";
        var tippArr = [];

        for(var i = 0;i<allText.length;i++)
        {
            var tex = allText[i].value.trim();
            if(tex.length > maxchar) // max number of characters in the text box
            {
                allText[i].style.backgroundColor = "#ffbbbb";
                toolong = true;
            }


            if(tex == "")
            {
                tippek = tippek + "GGG_";
                tippArr.push("GGG");
            }
            else
            {
                tippek += tex + "_";
                tippArr.push(tex);
            }
        }

        if(toolong)
        {
            alert("There are too long sentences.");
            return;
        }

        var agomb =  document.getElementById("beadGomb");
        if(tippArr.includes("GGG"))
        {
            if (confirm(globLang.notComplete) == true)
            {
                document.getElementById("submitCover").style.height = "100%";
                document.getElementById("subCovInner").style.height = "40px";

                agomb.innerHTML = globLang.loading;
              //  submitSoluProvide(tippek, atipe);
                submitSoluProvide(JSON.stringify(tippArr), atipe); // submit as JSON
                // animacio(elem);
            }
        }
        else {
            document.getElementById("submitCover").style.height = "100%";
            document.getElementById("subCovInner").style.height = "40px";

            agomb.innerHTML = globLang.loading;
           // submitSoluProvide(tippek, atipe); // user tips and the task type
            submitSoluProvide(JSON.stringify(tippArr), atipe); // submit as JSON
            // animacio(elem);
        }

        // alert(tippek);
        //

    }
    else
    {
        alert(globLang.alreadySubmitted);
    }
};

var GLOBVONALASTEACHER = "";
function getCorrected(ele)
{

    var azide = ele.getElementsByClassName("csakid");

    var kid = ele.getElementsByClassName("apath2");

    var azi = azide[0].innerHTML;


    globFeladatID = azi;
   // document.getElementById("tester").innerHTML = "getCorrected " + globFeladatID;
    //alert("glob task id: " + globFeladatID);
    var useTips = "";
    var apath = "";
    var tipu;
    var teacherCorr = "";
    var teacherRem = "";

    var indi = hwobj.corrected.findIndex(function(x) {if(x.id == azi){ return true }});

    useTips = hwobj.corrected[indi].userTipps;
    apath = hwobj.corrected[indi].apath;
    tipu = hwobj.corrected[indi].tipus;

    if(tipu != 0)
    {
        teacherCorr = hwobj.corrected[indi].correct;
        teacherRem = hwobj.corrected[indi].remarks;
    }




    if(useTips == "")
    {
        alert("Error, no tips.");
        return;
    }
  //  alert(hwobj.corrected[i].viewed);

    GLOBVONALASTEACHER = teacherCorr;
    globalTipps = useTips;


    if(tipu == "0")
    {
        getMusterVonalFile(apath, useTips, "", processMCCorrected);
      //  getTheFileMC(apath, useTips);
    }
    else if(tipu == "1")
    {
      //  alert("getCorrected: ez a vonalas kitöltős.");
        getMusterVonalFile(apath, useTips, teacherRem, procVonalasCorrected);
    }
    else if(tipu == "3")
    {
        getMusterVonalFile(apath, useTips, teacherRem, procVocCorrected);
    }
    else if(tipu == "2")
    {

        getMusterVonalFile(apath, useTips, teacherRem, procABCcorrecte);
    }
    else if(tipu == "5")
    {
        getMusterVonalFile(apath, useTips, teacherRem, procGram5corrected);
    }
    else if(tipu == "6")
    {
        getMusterVonalFile(apath, useTips, teacherRem, procGram6corrected);
    }
    else
    {
        alert("getCorrected: no type");
    }

}


function getSubmitted(elem)
{

    var ss = hwobj.submitted.findIndex(function(x) { if(x.id == elem.id ){return true}  } );

    if(ss != -1) {


        globFeladatID = hwobj.submitted[ss].id;

        var pathTo = hwobj.submitted[ss].apath;
        var userTips = hwobj.submitted[ss].userTipps;

        var filename = "MAJAXOK/ajaxGramSender2.php";
        var tempid = document.getElementById("tempida").value.trim();


        var kuld = "taskCime=" + pathTo + "&tempid=" + tempid;
        putinLoader();
        updateHW(filename, kuld).then(function (res) {
            fillSubmitted(res, userTips);
        });
    }
    else
    {
        alert("Error: no task id");
    }
}

function fillSubmitted(taFile, usertipps)
{
    offLoadeer();
    if(taFile.charAt(0) == "1")
    {
        toLogOut(globLang.logInAgain);
        return;
    }
    tFile = JSON.parse(taFile);
    var uTipps = usertipps.split("_");
    var ABCtips = usertipps.split("_");
    var tipus = parseInt(tFile.type);
    var cime = tFile.title;
    var inst = textDeco(tFile.instructions);

    var dashi = giveSubDas();

    var cimDiv = "<div style='color: #1a6cfb;font-weight: bold' >" + cime + "</div>";
    var instruDiv = "<div style='font-style: italic' >" + inst + "</div>";
    var fejDiv = "<div class='headFrame'>" + cimDiv + instruDiv + "</div>";

    if(tipus === 0 || tipus === 1 || tipus === 2) // type 1 = vonalas, type 2 = ABC
    {
        var tabsor = "";
        var tip = 0;
        if(inst.includes("nothing"))
        {
            var emptyOK = true;
        }
        else
        {
            emptyOK = false;
        }
       // alert(emptyOK);
       for(var i = 0;i<tFile.contents.length;i++)
       {
           var sent = tFile.contents[i].sentence;
           var senten = "";
           var vonal = " _________ ";
           var abcStil = [];

           for(var s = 0;s<sent.length;s++)
           {
               if(s === sent.length -1)
               {
                   vonal = "";
               }
               else
               {
                   if(uTipps[tip] !== "GGG")
                   {
                       if(tipus === 0)
                       {
                           var tipWord = tFile.contents[i].distractors[s];
                           vonal = "<span class='answerWord' style='font-weight: bold;color: #00AFFF'>" + tipWord[uTipps[tip]] + "</span>";
                       }
                       if(tipus === 1)
                       {
                           vonal = "<span class='answerWord' style='font-weight: bold;padding-left: 6px;padding-right: 6px;border-bottom-style: solid;border-bottom-width: 1px;border-bottom-color: #111111;color:#00afff;font-size:22px;font-family: " + '"' + 'Nanum Pen Script' + '"' + " '>" + uTipps[tip] + "</span>";
                       }


                   }
                   else
                   {
                       var noanswer = globLang.noanswer;
                       if(emptyOK)
                       {
                           noanswer = "---";
                       }
                       vonal = "<span class='answerWord' style='font-style: italic;color: #d20000' >" + noanswer + "</span>";
                   }

                   tip++;
               }
               senten += sent[s] + vonal;
           }

           tabsor += "<tr><td style='vertical-align: top' >" + parseInt(i+1) + ".</td><td>" + senten + "</td></tr>";

           var tabABCdist = "";
           if(tipus === 2) // if ABC multichoice + row for distractors
           {
               var wordRow = tFile.contents[i].distractors;
               var worABC = "";

               for(var d = 0;d<wordRow.length;d++)
               {
                   var kisAr = wordRow[d];
                   for(var k = 0;k<kisAr.length;k++)
                   {
                       var betu = String.fromCharCode(65 + k);
                       var astil = "";
                       if(ABCtips[i] == k)
                       {
                           astil = "style='color:#00AFFF'";
                       }
                       else
                       {
                           astil = "style='color:#000000'";
                       }
                       worABC += "<td " + astil + " >" + betu + ") " + kisAr[k] + "</td>";
                   }

               }

               tabABCdist += "<tr><td></td><td><table style='width: 100%;table-layout: fixed' ><tr>" + worABC + "</td></table></td></tr>";

               tabsor += tabABCdist;
           }
       }
        var titSor = "<tr><td colspan='2' class='tabTitle' style='padding-top: 24px;padding-bottom: 4px' >" + tFile.title + "</td></tr>";
        titSor += "<tr><td colspan='2' class='tabInstru' style='padding-top: 4px;padding-bottom: 24px' >" + textDeco(tFile.instructions) + "</td></tr>";
      //  var dashbo = giveSubDas();

        document.getElementById("workTop1").innerHTML = "<div class='keretDiv'>" + dashi + "<table class='taskTable' style='padding-bottom: 36px' >" + titSor + tabsor + "</table></div>";
    }
    else if(tFile.type == 3) // vocab
    {
        var tabsor = "";
        var tabrow = "";
        var wordArr = [];

        var sentences = tFile.contents;

        for(i = 0;i<sentences.length;i++)
        {
            var vonal1;
            var vonal2;

            if(uTipps[i] != "GGG")
            {
                var elozobetu = sentences[i].gel.trim();
                var lastC = elozobetu.charAt(elozobetu.length-1);
                var tipvon1 = sentences[uTipps[i]].go1;
                if(lastC === "" || lastC === "." || lastC === "?" || lastC === "!")
                {

                    tipvon1 = tipvon1.charAt(0).toUpperCase() + tipvon1.slice(1).toLowerCase();
                }

                var elozbet = sentences[i].ge2.trim();
                var lastC2 = elozbet.charAt(elozbet.length-1);
                var tipvon2 = sentences[uTipps[i]].go2;
                if(lastC2 === "." || lastC2 === "?" || lastC2 === "!")
                {

                    tipvon2 = tipvon2.charAt(0).toUpperCase() + tipvon2.slice(1).toLowerCase();
                }

                vonal1 = "<span class='beirtWord' style='color:#00AFFF' id='von_" + i + "' > " + tipvon1 + " </span>";
                vonal2 = "<span class='beirtWord' style='color:#00AFFF' id='von2_" + i + "' > " + tipvon2 + " </span>";
            }
            else
            {
                tipvon2 = " ";
                vonal1 = "<span class='beirtWord' style='font-weight: normal;font-style: italic;color: #D20000'  > " + globLang.noanswer + " </span>";
                vonal2 = "<span class='beirtWord' style='font-weight: normal;font-style: italic' > " + tipvon2 + " </span>";
            }


            var egyWord = {};
            var egysor = "";



            if(sentences[i].go2.trim() == "") // egy szavas sor
            {


                egysor = egysor + sentences[i].gel.trim() + vonal1 + sentences[i].ge2.trim() + vonal2;
                egyWord.w1 = sentences[i].go1;
                egyWord.w2 = "";
                egyWord.id = i;
                egyWord.mean = sentences[i].meaning;
                egyWord.used = false;
            }
            else
            {

                egysor = egysor + sentences[i].gel.trim() + vonal1 + sentences[i].ge2.trim() + vonal2 + sentences[i].ge3.trim();
                egyWord.w1 = sentences[i].go1;
                egyWord.w2 = sentences[i].go2;
                egyWord.id = i;
                egyWord.mean = sentences[i].meaning;
                egyWord.used = false;
            }
            wordArr.push(egyWord);
            var sorS = i + 1;
            tabrow = tabrow + "<tr><td style='vertical-align: top' >" + sorS + ".</td><td>" + egysor + "</td></tr>";



        }

       // wordArr = wordArr.sort(function(a, b) {return a.w1 > b.w1});
        wordArr.sort(function( a , b ){
            return a.w1 > b.w1 ? 1 : -1;
        });
        var wordSpans = "";
        var meani = 'ameaning';
        for(i = 0;i<wordArr.length;i++)
        {
            var egySpan = "<div class='words' onclick='document.getElementById(" + '"' + meani + '"' + ").innerHTML = this.id;'  id='" + wordArr[i].mean + "' >" + wordArr[i].w1 + " " + wordArr[i].w2 + "</div>";
            wordSpans = wordSpans + egySpan;
        }




        var wordDiv = "<div class='wordBackGr' style='margin-left: 24px;margin-right: 24px' >" + wordSpans + "</div><div style='background-color: #ffffff' ><span onclick='alert(globLang.clickWord)' style='width: 8px;height: 8px;display: inline-block;background-color: #00ce00;margin-left: 24px;margin-right: 4px;cursor: pointer' ></span><span id='selWord' class='word' style='color:#00a100;font-weight: bold' ></span><span id='ameaning' ></span></div>";
        var aTable = "<table style='background-color: #ffffff;padding-left: 36px;padding-right: 36px;width: 100%;padding-top: 12px;padding-bottom: 12px' >" + tabrow + "</table>";




        wordMeaning = document.getElementById('ameaning');

        document.getElementById("workTop1").innerHTML = "<div id='coverMCgram' class='coverMCgram' >" + dashi + "<div style='position: relative;background-color: #ffffff' >" + fejDiv + wordDiv + "<table class='mondatTable' >" + aTable + "</table></div></div>";

    }
    else if(tipus == 5)
    {
        var awo = tFile.contents.words;
        var dashi = giveSubDas();
        awo.sort();

        var wordsdivs = "";
        for(var w = 0;w<awo.length;w++)
        {
            wordsdivs += "<div class='words'  style='background-color: #dd0000;cursor:default' >" + awo[w] + "</div>";

        }
        var worddi = "<div style='padding-left:36px;padding-right: 36px;padding-top: 8px;padding-bottom: 8px ;background-color: #dcffff' >" + wordsdivs + "</div>";

        var texti = tFile.contents.text;
        var fullTex = "";
        vonal = " __________ ";
        for(w=0;w<texti.length;w++)
        {
            if(uTipps[w] != "GGG")
            {
                vonal = "<span class='answerWord' style='font-weight: bold;padding-left: 12px;padding-right: 12px;border-bottom-style: solid;border-bottom-width: 1px;border-bottom-color: #111111;color:#00afff;font-size:22px;font-family: " + '"' + 'Nanum Pen Script' + '"' + " '>" + uTipps[w] + "</span>";
            }
            else
            {
                vonal = "<span style='padding-left: 12px;padding-right: 12px;padding-top: 4px;color:#ff0000' >--" + globLang.noanswer + "--</span>";
            }
            if(w == texti.length-1)
            {
                vonal = "";
            }
            fullTex += texti[w] + vonal;
        }

        var numbered = false;
        if(texti.includes("#"))
        {
            numbered = true;
        }
        var tabSor = "";
        if(numbered) // we have to number the sentences line by line
        {
            var senti = texti.split("#");
            var tu = 0;
            for(var t = 0;t<senti.length;t++)
            {

                var monDarab = senti[t].split("_");

                var mondsor = "";
                for(var m = 0;m<monDarab.length;m++)
                {
                    if(m < monDarab.length-1)
                    {
                        if(uTipps[tu] != "GGG")
                        {
                            vonal = "<span class='answerWord' style='font-weight: bold;padding-left: 12px;padding-right: 12px;border-bottom-style: solid;border-bottom-width: 1px;border-bottom-color: #111111;color:#00afff;font-size:22px;font-family: " + '"' + 'Nanum Pen Script' + '"' + " '>" + uTipps[tu] + "</span>";
                            tu += 1;
                        }
                        else
                        {
                            vonal = "<span style='padding-left: 12px;padding-right: 12px;padding-top: 4px;color:#ff0000' >--" + globLang.noanswer + "--</span>";
                            tu += 1;
                        }

                    }
                    else
                    {
                        vonal = "";
                    }



                    mondsor += monDarab[m] + vonal;
                }
                tabSor += "<tr><td style='vertical-align: top' >" + parseInt(t+1) + ".</td><td>" + mondsor + "</td></tr>";
            }
        }
        else
        {

            var nagytext = texti.split("_");
            textsor = "";
            for(t = 0;t<nagytext.length;t++)
            {

                if(uTipps[t] != "GGG")
                {
                    vonal = "<span class='answerWord' style='font-weight: bold;padding-left: 12px;padding-right: 12px;border-bottom-style: solid;border-bottom-width: 1px;border-bottom-color: #111111;color:#00afff;font-size:22px;font-family: " + '"' + 'Nanum Pen Script' + '"' + " '>" + uTipps[t] + "</span>";
                }
                else
                {
                    vonal = "<span style='padding-left: 12px;padding-right: 12px;padding-top: 4px;color:#ff0000' >--" + globLang.noanswer + "--</span>";
                }
                if(t == nagytext.length-1)
                {
                    vonal = "";
                }


                textsor += nagytext[t] + vonal;
            }

            tabSor = "<tr><td>" + textsor + "</td></tr>";

        }


        document.getElementById("workTop1").innerHTML = "<div id='coverMCgram' class='coverMCgram' style='background-color: #ffffff'  >" + dashi + "<div style='position: relative' >" + fejDiv + worddi + "<table style='margin-top:20px;padding-left: 36px;padding-right: 36px;padding-bottom: 48px;width: 100%' >" + tabSor + "</table></div></div>";


    }
    else if(tipus == 6)
    {


        var contents = tFile.contents;

        var longS = "";
        for(i = 0;i<contents.length;i++)
        {
            longS += "<tr><td>" + contents[i].longsent + "</td></tr>";
            if(contents[i].starter.trim() != "")
            {
                longS += "<tr><td>" + contents[i].starter + "</td></tr>";
            }

            if(uTipps[i] != "GGG")
            {
                vonal = "<textarea readonly  style='width:100%;resize: none;font-weight: bold;color:#00afff;font-size:22px;font-family: " + '"' + 'Nanum Pen Script' + '"' + " '>" + uTipps[i] + "</textarea>";
            }
            else
            {
                vonal = "<textarea readonly  style='width:100%;resize: none;font-weight: bold;color:#444444' >" + globLang.noanswer + "</textarea>";
            }

            if(i == contents.length-1)
            {
              //  vonal = "";
            }
            longS += "<tr><td>" + vonal + "</td></tr>";
        }

        var exaDiv = "<div class='exampDiv'><div class='exampGreen' id='exampleDiv' >" + globLang.examples + "</div><div>" + tFile.exa + "</div></div>";
        document.getElementById("workTop1").innerHTML = "<div id='coverMCgram' class='coverMCgram' style='background-color: #ffffff'  >" + dashi + "<div style='position: relative' >" + fejDiv + exaDiv + "<table style='margin-top:20px;padding-left: 36px;padding-right: 36px;padding-bottom: 48px;width:100%' ><tr><td>" + longS + "</td></tr></table></div></div>";

    }
    else
    {
        alert("its under const");
    }
}

function checkSubmitted(azel)
{
  //  clearWorkTop();
    dealMenuButt();
  //  putinLoader();
    document.getElementById("beadhazi").style.color = "#ffff00";
    var suhw = hwobj.submitted;
    if(suhw != null)
    {
        var bele = "";
        for(var i = 0;i<suhw.length;i++)
        {
            bele = bele + "<div onclick='getSubmitted(this);' id='" + suhw[i].id + "' class='taskPoint' ><span style='width: 8px;height: 8px;background-color:" + tipusColors[suhw[i].tipus] + ";display: inline-block' ></span><span style='margin: 4px;padding: 4px' >" + suhw[i].atitle + "</span><span style='float: right' >" + suhw[i].date1 +"</span></div>";
        }
        if(suhw.length == 0)
        {
            bele = "<div id='smallText1' style='padding: 36px;background-color: #ffffff' >" + globLang.kistext1 + "</div>";
        }
        var korul = "<div style='width:100%;background-color:#ffffff;padding-top: 36px;padding-bottom: 36px'><div class='kisCimSor' ><span id='waitingel' class='kisCim' >" + globLang.waiting + "</span><span id='subDate' class='kisCim' style='float: right' >" + globLang.submDate + "</span></div>" + bele + "</div>";
      //  document.getElementById("workTop1").innerHTML = "<div style='width:100%;background-color:#ffffff;padding: 36px'><div class='kisCimSor' ><span id='waitingel' class='kisCim' >"+ globLang.waiting +"</span><span id='subDate' class='kisCim' style='float: right' >" + globLang.submDate + "</span></div>" + bele + "</div>";
        document.getElementById("workTop1").innerHTML = "<div class='keretDiv'>" + korul + "</div>";
    }
    else
    {
        document.getElementById("workTop1").innerHTML = "<div class='keretDiv'><div id='notSubmitYet'  style='padding: 36px;background-color: #ffffff' >" + globLang.notSubYet + "</div></div>";
    }
}


var globPage = 0;
var globMax = 0;
function incre(ine)
{
    if(ine > 0 && globPage+1 >= globMax)
    {
        alert("No more pages.");
        return;
    }
    if(ine <0 && globPage-1 < 0)
    {
        alert("You can't go back.");
        return;
    }
    globPage += ine;
    checkCorrected();
}
function checkCorrected(azel)
{
  //  clearWorkTop();
    dealMenuButt();
  //  putinLoader();
    document.getElementById("kijavhazi").style.color = "#ffff00";

    var corhw = hwobj.corrected;
    if(corhw != null)
    {
        var bele = "";
        var allItem = corhw.length;

        var itemPerPage = 50;




        if(corhw.length > itemPerPage)
        {
            var marad = allItem % itemPerPage;
            var maxpage = Math.floor(allItem / itemPerPage);
            if(marad != 0)
            {
                maxpage++;
            }
            globMax = maxpage;

            var fro = globPage * itemPerPage;
            var ato = fro + itemPerPage;
            if(globPage == maxpage-1)
            {
                ato = fro + marad;
            }

            bele = "<div style='padding-left: 36px;padding-right: 36px;padding-top: 4px;padding-bottom: 4px;margin-top: 8px;margin-bottom: 4px;background-color: #ffffff'>" +  parseInt(globPage + 1) + "/" + maxpage + "<span class='buttPlus' onclick='incre(1)' >+</span><span class='buttPlus'  onclick='incre(-1)' >-</span></div>";
        }
        else
        {
            fro = 0;
            ato = corhw.length;
        }


        for(var i = fro;i<ato;i++)
        {
            if(corhw[i].viewed != "no") // already seen
            {
                if(corhw[i].redo == "no")
                {
                    var be = "T";
                }
                else
                {
                    be = "R";
                }
                var latott = "<div style='display: inline-block;background-color: #e8e8de;float: right;margin-left: 2px' >" + be + "</div>";

            }
            else
            {
                if(corhw[i].redo == "no")
                {
                     be = "T";
                }
                else
                {
                    be = "R";
                }
                 latott = "<div style='display: inline-block;background-color: #d5002e;float: right;margin-left: 2px' >" + be + "</div>";

            }

            bele += "<div onclick='getCorrected(this);' id='co_" + i + "' class='taskPoint' oncontextmenu='acontext(this, event);return false;'  >" + "<span class='sorexp2' ><span id='s" + i + "' class='contextMenu'></span></span>" +

             "<span style='width: 8px;height: 8px;background-color:" + tipusColors[corhw[i].tipus] + ";display: inline-block' ></span><span style='padding: 4px;margin: 4px' class='apath2' >" + corhw[i].atitle + "</span>" + "<span style='display: none' class='csakid'>" + corhw[i].id + "</span>" + latott + "<span style='float: right' >" + corhw[i].date1 +"</span></div>";
        }
        if(corhw.length == 0)
        {
            bele = "<div id='smallText2' style='padding: 36px;background-color: #ffffff' >" + globLang.kistext2 + "</div>";
        }

        var korul = "<div style='width:100%;background-color:#ffffff;padding-top: 36px;padding-bottom: 36px'><div class='kisCimSor' ><span id='kijavitott' class='kisCim' >" + globLang.javitva + "</span><span><select style='margin-left: 4px' onchange='askinFor(this)' ><option value='5'>5</option><option value='10'  disabled selected style='display:none;' ></option><option value='10' >10</option><option value='20' >20</option><option value='50' >50</option><option value='100' >100</option><option value='50000' >ALL</option></select></span><span id='corDa' class='kisCim' style='float: right' >" + globLang.corrDate + "</span></div>" + bele + "</div>";
        document.getElementById("workTop1").innerHTML = "<div class='keretDiv'>" + korul + "</div>";
      //  document.getElementById("workTop1").innerHTML = "<div style='width:100%;background-color:#ffffff;padding: 36px'><div class='kisCimSor' ><span id='kijavitott' class='kisCim' >" + globLang.javitva + "</span><span id='corDa'  class='kisCim'  style='float: right' >" + globLang.corrDate + "</span></div>" + bele + "</div>";
    }
    else
    {
        document.getElementById("workTop1").innerHTML = "<div class='keretDiv'><div id='smallText3' style='padding: 36px;background-color: #ffffff' >" + globLang.kistext3 + "</div></div>";
    }
}

function acontext(elem, e)
{
    e.stopPropagation();
   killContextMenus();

    var szam = elem.id.split("_");
    var azid = "s" + szam[1];


    var azelem = document.getElementById(azid);
    azelem.innerHTML = "<div class='menupoint' onclick='wantRedoHw(" + szam[1] + ", 2, event)' >" + globLang.del2 + "</div><div class='menupoint' onclick='wantRedoHw(" + szam[1] + ", 1, event)' >"+ globLang.redohw +"</div>";
    azelem.style.visibility = "visible";

}

function wantRedoHw(ss, code, e)
{
    e.stopPropagation();
    var apathja =  hwobj.corrected[ss].apath;
    var taskide = hwobj.corrected[ss].id;
    var userNeve = document.getElementById("inName").value;
    var kuld = "user=" + userNeve + "&taskpa=" + apathja + "&taskid=" + taskide + "&code=" + code;

   // "TEACHER/ajaxSubmitHW.php
    var filename = "TEACHER/ajaxAssignHW.php";

    updateHW(filename, kuld).then(function(res)
    {

        var passWor = document.getElementById("inPass").value.trim();

        var kuld = "user=" + userNeve + "&pw=" + passWor + "&code=1" + "&num=" + 10; // code 1 get howmework
        var filename = "MAJAXOK/ajaxHwSend.php";

        updateHW(filename, kuld).then(function(res)
        {
            hwobj = JSON.parse(res);
            fillHomework();
            if(code == 2)
            {
                checkCorrected();
            }

     });
    }
    );

    killContextMenus();

     }

function killContextMenus()
{
    var allContMenu = document.getElementsByClassName("contextMenu");
    for(var i = 0;i<allContMenu.length;i++)
    {
        allContMenu[i].style.visibility = "hidden";
    }
}
function askinFor(elem)
{
    globPage = 0;
    var aUserNeve = document.getElementById("inName").value.trim();
    var passWor = document.getElementById("inPass").value.trim();

    var kuld = "user=" + aUserNeve + "&pw=" + passWor + "&code=1" + "&num=" + elem.value; // code 1 get howmework
    var filename = "MAJAXOK/ajaxHwSend.php";
    updateHW(filename, kuld).then(function(res)
    {
        elem.selectedIndex = -1;
        hwobj = JSON.parse(res);
        fillHomework();
        checkCorrected();
    });
}


var popupid = "";

var nyit = true;

function vonalClick(el, e)
{

    e.stopPropagation();

    if(popupid !== "") // close previous
    {
        var eleme = document.getElementById(popupid);
        eleme.style.visibility = "hidden";
        var vonal = eleme.parentElement;
        vonal.style.backgroundColor = "transparent";
    }


    if(el.className === "word")
    {

        nyit = false;
        var pari = el.parentNode;
        document.getElementById(pari.id).style.visibility = "hidden";

        var pari1 = el.parentElement;
        var pari2 = pari1.parentElement;
        pari2.style.backgroundColor = "transparent";

        var avonal = pari2.getElementsByClassName("vona")[0];

        avonal.innerHTML = el.innerHTML.replace("<br>", "");
        avonal.style.color = "#4466ff";
        avonal.style.fontWeight = "bold";

        // write in solution to the json tree
        var azo = el.id;
        var szamok = azo.split("w"); // 0 hanyadik mondat; 1 hagyadik gap; 2 hanyadik szó, ez a megoldás száma
        var szam1 = parseInt(szamok[0]);
        var szam2 = parseInt(szamok[1]);
        var szam3 = parseInt(szamok[3]);

      //  obj.contents[szam1].solutions[szam2] = szamok[2];
     //   var miez = obj.contents[szam1].solutions[szam2];
        // alert(miez);
        globUserTipps[szam3] = szamok[2];
    }


    if(el.className === "tooltip2") // vonal click
    {
        var curPa = hwobj.assigned.findIndex(function(x) {if(x.id == globFeladatID){ return true }});
       if(curPa != -1)
       {
            var popi = el.getElementsByClassName("tooltiptext2");
            popupid = popi[0].id;
            document.getElementById(popi[0].id).style.visibility = "visible";
            el.style.backgroundColor = "#ffff66";
            nyit = true;
        }
        else {
            alert(globLang.alreadySubmitted);
        }


    }




}

var glogTaskCim = "";
var obj;
var procMcGram = function(inp)
{

    // GET NEW HOMEWORK AND SHOW THE TAKS
    var minden = "";
    popupid = "";
    obj = JSON.parse(inp);
  //  document.getElementById("title").innerHTML = obj[0].title;
  //  document.getElementById("instru").innerHTML = obj[0].instructions;

    var contents = obj.contents;
    glogTaskCim = obj.title;


    globUserTipps = [];
    var bele = "";
    var gap = 0;
    for(i=0;i<contents.length;i++)
    {

        var sentence = contents[i].sentence;

        var distract1 = [];
        distract1 = contents[i].distractors;
        var sor = "";

        for(var k=0;k<sentence.length;k++)
        {

            if(k<sentence.length-1)
            {
                var dist = [];
                for(d=0;d<distract1[k].length;d++)
                {
                    dist = distract1[k];

                    var inn = "";
                    for(b=0;b<dist.length;b++)
                    {
                        inn = inn + "<span class='word' id='" + i + "w" + k + "w" + b + "w" + gap + "' onclick='vonalClick(this, event)' >" + dist[b] + "</span>";
                    }
                }
                globUserTipps.push("GGG"); // fill user tipps array
                gap++;
            }





            var agi = contents[i].solutions;


            var vonal = "<span class='tooltip2' id='" + i + k  + "' onclick='vonalClick(this, event);' > <span class='vona'>__________</span><span id='s" + i + k + "' class='tooltiptext2'>" + inn + "</span></span>";

            if(k == sentence.length -1)
            {
                vonal = " ";
            }

            sor = sor +  sentence[k] + vonal;
            //  minden = "<tr><td>" + vonal + sentence[k] + vonal + "</td></td>";
        }


        var sorszam = parseInt(i+1);
        bele = bele + "<tr><td class='sorsz' >" + sorszam + ".</td><td>" + sor + "</td></td>";
        // alert(bele);



    }

    var instuc = textDeco(obj.instructions);
    // alert(obj.helps);
    var bel = "";
    if(obj.helps && obj.helps != null)
    {

        for(var h = 0;h<obj.helps.length;h++)
        {
            var nevL = obj.helps[h];
            if(nevL.trim() != "")
            {
                bel = bel + "<span class='helpSpan' onclick='loadHelper(" + '"' + nevL + '"' + ", 0);' >h</span>";
            }

        }
    }
    var helpDiv = "<div>" + bel + "</div>";



   // var atit = "<tr><td colspan='2' class='tabTitle' >" + obj.title + "</td></tr>";
   // var azinst = "<tr><td colspan='2' class='tabInstru' >" + instuc + "</td></tr>";

    var lev = null;
    if(typeof obj.weight !== 'undefined')
    {
        lev = obj.weight;
    }


    var helper = "<tr><td colspan='2'>" + bel + "</td></tr>";
  //  var butto = "<tr><td colspan='2' style='padding-top: 16px;padding-bottom: 24px' ><div  style='text-align: center;background-color: #ffffff' ><span id='beadGomb' onclick='check(this)' class='beadomButt'>" + globLang.beadom + "</span></div></td></tr>";
    var submitDiv = submitButton("check()");


    document.getElementById("workTop1").innerHTML = "<div id='coverMCgram' class='coverMCgram' style='background-color: #ffffff' >" + giveNewHwDas() + "<div style='position: relative' ><div id='submitCover' class='subCov' ><div class='subCovBele' id='subCovInner' ><span id='beadText'>" + globLang.submDate + "</span><span id='nextGo' class='nextTask' onclick='ujHwNext(1)' >" + globLang.nextTasked + "</span></div></div><table class='mondatTable' style='text-align: left;margin-top: 14px;padding-left: 36px;padding-right: 36px' id='montab' >" + cimGauge(glogTaskCim, instuc, lev) +  helper + bele +"</table></div>" + submitDiv + "</div>";

   animNewHw();

};

function animNewHw()
{
    var mon = document.getElementById("montab");
    setTimeout(function(){mon.style.opacity = "1"; mon.style.marginTop = "28px"; }, 20);
}

function getHelp()
{
   var acover = document.getElementById("coverMCgram");


    if(acover != null)
    {
        var atex = "This is some grammar help for you. ";
        var helpDiv = "<div class='helpBelso' >" + atex + atex + atex + atex + atex + atex + atex + atex + atex + "</div>";


        var taskCont = document.getElementById("workTop1");
        var helpTD = document.getElementById("helpContent");




        taskCont.classList.toggle("taskContentNormal");
        taskCont.classList.toggle("taskcontentLeft");

        helpTD.classList.toggle("helpContentNormal");
        helpTD.classList.toggle("helpContentLeft");

    }




}

function textDeco(input)
{
    var ret1 = input.replace(/B1/g, '<b>');
    return ret1.replace(/B2/g, '</b>');
}


function getPage()
{
    var curPa = 0;
    var maxho = hwobj.assigned.length;
    for(var i = 0;i<maxho;i++)
    {
        if(hwobj.assigned[i].id == globFeladatID) // current taks id
        {
            curPa = i+1;
            break;
        }
    }

    return [curPa, maxho];

}



function ujHwNext(ada)
{
    var assignedOrCorrected;

        assignedOrCorrected = hwobj.assigned;

    var maxho = assignedOrCorrected.length;
    var curPa = 0;
    var tip;

  //  curPa = assignedOrCorrected.findIndex(x => x.id == globFeladatID); // ez is jó lenne, csaak hát az editor...

    curPa = assignedOrCorrected.findIndex(function(x) {if(x.id == globFeladatID){ return true }});

   // alert("currp: " + curPa + " max: " + maxho);

    if(curPa + ada >= maxho)
    {
        alert(globLang.nonext);
        return;
    }
    if(curPa + ada < 0)
    {
        alert(globLang.noback);
        return;
    }

    popupid = "";
    popupid2 = "";
    curPa = curPa + ada;
    globFeladatID = assignedOrCorrected[curPa].id;
    GLOBREDO = assignedOrCorrected[curPa].redo;
    var nextPath = assignedOrCorrected[curPa].apath; // next task path
    tip = assignedOrCorrected[curPa].tipus;

    if(tip == "0")
    {
        getTheFileVonal(nextPath, procMcGram);
    }
    else if(tip == "1")
    {
        getTheFileVonal(nextPath, procVonal);
    }
    else if(tip == "3")
    {
        getTheFileVonal(nextPath, procVocab);
    }
    else if(tip == "2") // ABC választós MC grammar
    {
        getTheFileVonal(nextPath, procABCgrammar);
    }
    else if(tip == "5")
    {
        getTheFileVonal(nextPath, procGram5uj);
    }
    else if(tip == "6")
    {
        getTheFileVonal(nextPath, procGram6);
    }
    else
    {
        alert("ujHwNext: no type specified.");
    }

}

function subHwNext(ada)
{
    var maxPage = hwobj.submitted.length;
    var tip;
    var teacher;
    var currPage = hwobj.submitted.findIndex(function(x) {if(x.id == globFeladatID){ return true }});

    if(currPage + ada >= maxPage)
    {
        alert(globLang.nonext);
        return;
    }
    if(currPage + ada < 0)
    {
        alert(globLang.noback);
        return;
    }

    currPage = currPage + ada;
    popupid2 = "";
    globFeladatID = hwobj.submitted[currPage].id;

    var oldNextPath = hwobj.submitted[currPage].apath; // next task path
    var userTips = hwobj.submitted[currPage].userTipps; // next usertipps
   // var teacherRem = hwobj.corrected[currPage].remarks; // teacher's remarks még nincsenek

    var filename = "MAJAXOK/ajaxGramSender2.php";
    var tempid = document.getElementById("tempida").value.trim();
    var kuld = "taskCime=" + oldNextPath + "&tempid=" + tempid;

    putinLoader();
    updateHW(filename, kuld).then(function(res)
    {
        fillSubmitted(res, userTips);
    });

}


function oldHwNext(ada)
{

  //  var currPage = 0;
    var maxPage = hwobj.corrected.length;
    var tip;
    var teacher;

    var currPage = hwobj.corrected.findIndex(function(x) {if(x.id == globFeladatID){ return true }});

    if(currPage + ada >= maxPage)
    {
        alert(globLang.nonext);
        return;
    }
    if(currPage + ada < 0)
    {
        alert(globLang.noback);
        return;
    }


   // alert((currPage +1) + " " + maxPage);
        currPage = currPage + ada;
        popupid2 = "";
        globFeladatID = hwobj.corrected[currPage].id;

        var oldNextPath = hwobj.corrected[currPage].apath; // next task path
        var userTippek = hwobj.corrected[currPage].userTipps; // next usertipps
        var teacherRem = hwobj.corrected[currPage].remarks; // teacher's remarks
        tip = hwobj.corrected[currPage].tipus;
        if(tip != 0) // ha vonalas nyelvtani feladat vagy vocab
        {
          teacher = hwobj.corrected[currPage].correct;
          GLOBVONALASTEACHER = teacher;
        }
        //alert("van következő: " + nextPath);
        if(tip == "0")
        {
          //  getTheFileMC(oldNextPath, userTippek);
          //  getMusterVonalFile(oldNextPath, userTippek, null, processMCCorrected)
            getMusterVonalFile(oldNextPath, userTippek, "", processMCCorrected);
        }
        else if(tip == "1")
        {
          //  alert("oldHwNext: ez vonalas kitöltős.");
            getMusterVonalFile(oldNextPath, userTippek, teacherRem, procVonalasCorrected);
        }
        else if(tip == "3")
        {
            getMusterVonalFile(oldNextPath, userTippek, teacherRem, procVocCorrected);
        }
        else if(tip == "2")
        {
            getMusterVonalFile(oldNextPath, userTippek, teacherRem, procABCcorrecte);
        }
        else if(tip == "5")
        {
            getMusterVonalFile(oldNextPath, userTippek, teacherRem, procGram5corrected);
        }
        else if(tip == "6")
        {
            getMusterVonalFile(oldNextPath, userTippek, teacherRem, procGram6corrected);
        }
        else
        {
            alert("oldHwNext: no type");
        }




}



function getOldPage()
{
    var curPagi = 0;
    var maxHossz = hwobj.corrected.length;

    for(var i = 0;i<maxHossz;i++)
    {
        if(hwobj.corrected[i].id == globFeladatID) // current taks id
        {
            curPagi = i+1;
            break;
        }
    }

    return [curPagi, maxHossz];

}

function clearPopUps()
{
    if(popupid !== "") // close previous
    {
        var eleme = document.getElementById(popupid);
        eleme.style.visibility = "hidden";
        var vonal = eleme.parentElement;
        vonal.style.backgroundColor = "transparent";
    }
    nyit = true;
}

function check()
{

    var curPa = hwobj.assigned.findIndex(function(x) {if(x.id == globFeladatID){ return true }});
    var agomb =  document.getElementById("beadGomb");
    if(curPa != -1)
    {
        hwobj.assigned[curPa].viewed = "yes";

        if(allFilled())
        {
            document.getElementById("submitCover").style.height = "100%";
            document.getElementById("subCovInner").style.height = "40px";

            agomb.innerHTML = globLang.loading;
            var mind = "";
            for(var i = 0;i<globUserTipps.length;i++)
            {
                mind += globUserTipps[i] + "_";
            }
            submitSoluProvide(mind, 0);
        }
    }
    else
    {
        if(agomb.innerHTML == globLang.submDate)
        {
            alert(globLang.alreadySubmitted);
        }

    }
}


function updateHomework(amo)
{

    var aUserNeve = document.getElementById("inName").value.trim();
    var passWor = document.getElementById("inPass").value.trim();

    var kuld = "user=" + aUserNeve + "&pw=" + passWor + "&code=1" + "&num=" + amo; // code 1 get howmework


    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            var respo = this.responseText;
            //alert(respo);
            hwobj = JSON.parse(respo);

            fillHomework();


        }
    };

    xhttp.open("POST", "MAJAXOK/ajaxHwSend.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(kuld);
}

var hwobj;

function updateHW(filename, kuld)
{
     return new Promise(function (resolve, reject){


        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              resolve(this.responseText);
            }
        };

        xhttp.onerror = function () {
          //  reject(this.status + " " + this.statusText);
            reject("");
        };

        xhttp.open("POST", filename, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(kuld);
    })
}







function fillHomework()
{

    //if(hwobj != null && hwobj !== "")

    if(hwobj != null)
    {

        var ujhw = hwobj.assigned;
        var behw = hwobj.submitted;
        var corHw = hwobj.corrected;

        if(ujhw != null)
        {
           ujhw = ujhw.reverse();
            document.getElementById("assHW").innerHTML = ujhw.length;
        }
        else
        {
            document.getElementById("assHW").innerHTML = "0";
        }

        if(behw != null)
        {
            behw = behw.reverse();
            document.getElementById("subHW").innerHTML = behw.length;
        }
        else
        {
            document.getElementById("subHW").innerHTML = "0";
        }

        if(corHw != null)
        {
            corHw = corHw.reverse();
            document.getElementById("corHW").innerHTML = corHw.length;
        }
        else
        {
            document.getElementById("corHW").innerHTML = "0";
        }
    }
    else // totally empty file, no assigned, no submitted, no corrected
    {

        document.getElementById("assHW").innerHTML = "0";
        document.getElementById("subHW").innerHTML = "0";
        document.getElementById("corHW").innerHTML = "0";
    }


    //document.getElementById("workTop1").innerHTML = ujhw.length;
}








// GET CORRECTED HOMEWORK
var globalTipps = "";
/*
function getTheFileMC(afile, userSolus)
{
  putinLoader();
    globalTipps = userSolus;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {


            processMCCorrected(this.responseText);

        }
    };
   // kuld = "openthis=" + afile;
    var kuld = "taskCime=" + afile;
//    xhttp.open("POST", "ajaxsend.php", true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(kuld);


}
*/
var chekObj;

var processMCCorrected = function(inp, userTipps)
{
    offLoadeer();
    //globalTipps = userSolus;
    var userSol = userTipps.split("_");
    popupVon = null;
    //  alert(userSol.length);
    var minden = "";
    var bele = "";


    chekObj = JSON.parse(inp);
   // document.getElementById("title").innerHTML = chekObj[0].uid;

   // alert("in process, glob id: " + globFeladatID);

    var contents = chekObj.contents;
    var von = 0;
    var corrSolu = 0;
    var incorrect = 0;
    var notProvided = 0;

    for(var i=0;i<contents.length;i++)
    {

        var sentence = contents[i].sentence;
        var sor = "";
        var distract1 = [];
        distract1 = contents[i].distractors;
        // var_dump($distract1);

        var remarks = [];
        remarks = contents[i].remarks;

        //  var corSolu = contents[i].solu; // ez egy array???
        var corSolu = [];
        corSolu = contents[i].solu;

        var corr = "";

        var kulsoSols = "";
        var bestsolus = [];
        for(var k=0;k<sentence.length;k++)
        {
            var sols = "";
            if(k==0)
            {
                for(var v=von;v<von + sentence.length-1;v++)
                {
                    sols = sols + userSol[v] + "-";
                }
                kulsoSols = sols;
                var mindi = "";
                for(var q=0;q<corSolu.length;q++)
                {
                    if(q==0)
                    {
                        var sepi = "";
                    }
                    else
                    {
                        sepi = "-";
                    }
                    mindi = mindi + sepi + corSolu[q];
                }
                //  alert(kulsoSols + " ::: " + corSolu);
                //

                var totcor = 0;
                for(var c=0;c<corSolu.length;c++)
                {
                    var corrects = "";
                    var ajo = corSolu[c].split('-');
                    var kuls = kulsoSols.split('-');
                    var ok = false;
                    for(var w=0;w<ajo.length;w++)
                    {
                        if(ajo[w].includes('a'))
                        {
                            for(var u=0;u<ajo.length;u++)
                            {
                                if(ajo[u].includes('a') && ajo[u].includes(kuls[u]) === false)
                                {
                                    ok = false;
                                    break;
                                }
                                else
                                {
                                    ok = true;
                                }
                            }

                            if(ok)
                            {
                                corrects = corrects + "1";
                                totcor++;
                            }
                            else
                            {
                                corrects = corrects + "0";
                            }
                        }
                        else
                        {
                            if(ajo[w].includes(kuls[w]))
                            {
                                corrects = corrects + "1";
                                totcor++;
                            }
                            else
                            {
                                corrects = corrects + "0";
                            }
                        }


                    }
                    var bestsolu = {};
                    bestsolu.sol = corrects;
                    bestsolu.total = totcor;
                    bestsolus.push(bestsolu);

                }
                // alert("corrects: " + corrects);


                bestsolus.sort(function(a, b){return b.total - a.total});


                //  alert("bestsolus " + bestsolus[0].sol + " bestsolo hossz: " + bestsolus.length); // return a bestsolu object

                //  alert(bestSol); var finalSole = testCheck(kulsoSols, corSolu); //string + array
                //  alert(finalSole);
            }

            // egy sor összes user tipple egy stringbe, pl: 1-1-0

            var jok = bestsolus[0].sol.split("");
            var astyle = "";

            if(k<sentence.length-1)
            {
                var inn = "";

                var dist = [];
                var remi = [];
                for(var d=0;d<distract1[k].length;d++)
                {
                    dist = distract1[k];
                    remi = remarks[k];
                }


                var ajoSol = false;
                if(jok[k] == "1")
                {
                    astyle = "style='color:#008800'"; // correct solution
                    inn = "correct solution";
                    corrSolu++;

                }
                else
                {
                    astyle = "style='color:#ff0000'"; // incorrect solution
                    inn = "<span class='word' id='" + i + "w" + k + "w" + "'  >" + remi[userSol[von]] + "</span>";
                    incorrect++;

                }

                if(userSol[von].trim() === "GGG")
                {
                    inn = "<span class='word' id='" + i + "w" + k + "w" + "' onclick='checkerVonalClick(this, event)' >" + globLang.noanswer + "</span>";
                    notProvided++;
                }

            }

            var vonalRa = "??";

            if(userSol[von].trim() != "GGG")
            {
                vonalRa = dist[userSol[von]]; // de még nem tudjuk, hogy ez jó-e
            }
            else
            {
                vonalRa = "__________";
            }

            var vonal = "<div class='tooltip2' id='" + i + "-" + k  + "' onclick='checkerVonalClick(this, event);' >";
            vonal += "<span class='vona' " + astyle + " >" + vonalRa + "</span>";
            vonal += "<span  id='s" + i + k + "' class='checkeTipText'>" + inn + "</span>";
            vonal += "</div>";

            if(k == sentence.length -1)
            {
                vonal = " ";
            }
            else
            {
                von++;
            }

            sor = sor +  sentence[k] + vonal;

        }

        var sorszam = parseInt(i+1);
        bele += "<tr><td colspan='2' ><div class='sorexp' style='height: 0'><div class='vonalasExp' id='tool2" + i + "' ></div></div></td></tr>";
        bele += "<tr><td class='sorsz' >" + sorszam + ".</td><td>" + sor + "</td></td>";

    }


    var instuc =  chekObj.instructions.replace(/B1/g, '<b>');
    instuc =  instuc.replace(/B2/g, '</b>');

    var atit = "<div class='taskInstFrame'><div class='tabTitle' >" + chekObj.title + "</div><div class='tabInstru' >" + instuc + "</div></div>";

    var oss = corrSolu + incorrect;
    var dashbo2 = giveOldHwDas();


    var messSor = "<tr><td colspan='2' class='techerMessage'>" + getMessage() + "</td></tr>";

    var eredMenyTab = "<tr><td colspan='2' style='padding-top: 12px;text-align: right' ><span class='resultInfo' >Correct: "+ corrSolu +" / "+ oss +"</span> | <span class='resultInfoIncorr'> Incorrect: "+ incorrect + "</span> of which not answered: " + notProvided + "</td></tr>";

    var eredDiv = "<div class='kisParal' ><span class='resultInfo' >Correct: "+ corrSolu +" / "+ oss +"</span> | <span class='resultInfoIncorr'> Incorrect: "+ incorrect + "</span> of which not answered: " + notProvided + "</div>";
    minden = "<div class='parallaxOuterDiv'>" + dashbo2 + atit + "<div class='parallaxDiv'><table class='mondTabPCorrected' >" + bele + messSor +"</table>" + eredDiv + "</div></div>";


    document.getElementById("workTop1").innerHTML =  "<div class='keretDiv'>" +  minden + "</div>";

    if(!getViewed()) // ha még nem tekintettük meg, akkor send in: it is viewed by user
    {
        if(incorrect == 0)
        {
            if(!isRedone())
            {
                sendInHibatlan(true);
            }
            else
            {
               // alert("ez már redone");
                sendInHibatlan(false);
            }
        }
        else
        {
            sendInHibatlan(false);
        }
    }


};


function getViewed()
{
    for(var i = 0;i<hwobj.corrected.length;i++)
    {
        if(hwobj.corrected[i].id === globFeladatID)
        {

           if(hwobj.corrected[i].viewed === "no")
           {
               hwobj.corrected[i].viewed = "yes";
               return false;
           }
        }
    }
    return true;
}

function isRedone()
{
    for(var i = 0;i<hwobj.corrected.length;i++)
    {
        if(hwobj.corrected[i].id === globFeladatID)
        {
            if(hwobj.corrected[i].redo === "no")
            {
                return false;
            }
        }
    }
    return true;
}


function getMessage()
{

    var inde = hwobj.corrected.findIndex(function(x) {if(x.id == globFeladatID){ return true }});
    return hwobj.corrected[inde].message;
    /*
    for(var i = 0;i<hwobj.corrected.length;i++)
    {
        if(hwobj.corrected[i].id == globFeladatID)
        {

            return hwobj.corrected[i].message;

        }
    }
    return "";
    */
}

var popupid2 = "";
var nyitva = false;

function checkerVonalClick(el, e)
{

    e.stopPropagation();
    /*
    if(popupid2 !== "") // close previous
    {
        var eleme = document.getElementById(popupid2);
        eleme.style.visibility = "hidden";
        var vonal = eleme.parentElement;
        vonal.style.backgroundColor = "transparent";
    }

    */

    if(popupVon != null)
    {
        document.getElementById(popupVon).style.visibility = "hidden";
    }

    var szamok = el.id.split('-');
    var tabSorDivId = "tool2" + szamok[0];
    popupVon = tabSorDivId;

    // 1. child's first kid
    var kids = el.children;
    var secondKid = kids[1];

    var allYello = document.getElementsByClassName("tooltip2");
    for(var i = 0;i<allYello.length;i++)
    {
        allYello[i].style.backgroundColor = "#ffffff";
    }

    el.style.backgroundColor = "#ffff66";

    document.getElementById(tabSorDivId).innerHTML = secondKid.innerHTML;
    document.getElementById(tabSorDivId).style.visibility = "visible";
    /*
    if(el.className === "tooltip2") // vonal click
    {

        var popi = el.getElementsByClassName("checkeTipText");

        popupid2 = popi[0].id;
        if(nyitva === false)
        {
            document.getElementById(popi[0].id).style.visibility = "visible";
            el.style.backgroundColor = "#ffff66";
        }
        // nyit = true;

    }
    else
    {
        var eleme = document.getElementById(popupid2);
        eleme.style.visibility = "hidden";
        var vonal = eleme.parentElement;
        vonal.style.backgroundColor = "transparent";
    }
    */



}

function clrPopups()
{

    if(popupid !== "") // close previous
    {
        var eleme = document.getElementById(popupid);
        if(eleme != null)
        {
            eleme.style.visibility = "hidden";
        }


    }

    if(popupid2 !== "") // close previous
{
    eleme = document.getElementById(popupid2);
    if(eleme != null)
    {
        eleme.style.visibility = "hidden";
    }


}



    if(popupVon != null)
    {
        document.getElementById(popupVon).style.visibility = "hidden";
    }

    var allYe = document.getElementsByClassName("tooltip2");
    for(var i = 0;i<allYe.length;i++)
    {
        allYe[i].style.backgroundColor = "#ffffff";
    }

    killContextMenus();
    /*
     var allPopups = document.getElementsByClassName("tooltip2");
     for(i=0;i<allPopups.length;i++)
     {
     allPopups[i].style.display = "hidden";
     }
     */
}

function getAccount(acode)
{

    if(acode == 1)
    {
        if(!confirm(globLang.realDelete))
        {
            return;
        }
    }
    putinLoader();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            showAcc(this.responseText);
        }
    };



    var userTi = document.getElementById("tempida").value.trim();

    var kuld = "cod=" + acode +  "&tempi=" + userTi;
    xhttp.open("POST", "MAJAXOK/ajaxGetAccount.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(kuld);
}

function showAcc(inpu)
{
  //  alert(inpu);
    dealMenuButt();
  offLoadeer();
    //alert(inpu);
    var charZero = inpu.charAt(0);

    if(charZero == "{") {
        var USER = JSON.parse(inpu);

        var macik = inpu.split('-');
        var usNN = document.getElementById("inName").value;


        var mac = "";
      //  var numofMac = parseInt(macik[0]);
        var numofMac = parseInt(USER.bear);
        for (var i = 0; i < numofMac; i++) {

            mac = mac + "<td>" + "<img style='width: 16px' src='IMAGES/freebear_kicsi.png'>" + "<td>";
        }
        for (i = 0; i < 6 - numofMac; i++) {
            mac = mac + "<td>" + "<img style='width: 16px' src='IMAGES/freebear_kicsi_arny.png'>" + "<td>";
        }
        var mac1 = "<tr><td id='macitd' >" + globLang.maci + "</td>" + mac + "</tr>";

       // numofMac = parseInt(macik[1]);
        numofMac = parseInt(USER.fox);
        mac = "";
        for (var i = 0; i < numofMac; i++) {

            mac = mac + "<td>" + "<img style='width: 16px' src='IMAGES/free_fox_kicsi.png'>" + "<td>";
        }
        for (i = 0; i < 6 - numofMac; i++) {
            mac = mac + "<td>" + "<img style='width: 16px' src='IMAGES/free_fox_kicsi_arny.png'>" + "<td>";
        }
        var mac2 = "<tr><td id='rokatd' >" + globLang.roka + "</td>" + mac + "</tr>";

        //numofMac = parseInt(macik[2]);
        numofMac = parseInt(USER.owl);
        mac = "";
        for (var i = 0; i < numofMac; i++) {

            mac = mac + "<td>" + "<img style='width: 16px' src='IMAGES/free_owl_kicsi.png'>" + "<td>";
        }
        for (i = 0; i < 6 - numofMac; i++) {
            mac = mac + "<td>" + "<img style='width: 16px' src='IMAGES/free_owl_kicsi_arny.png'>" + "<td>";
        }
        var mac3 = "<tr><td id='owltd' >" + globLang.owl + "</td>" + mac + "</tr>";

        var accDiv1 = "<div class='kisCim' style='background-color: #ffffff;padding-left: 36px;padding-right: 36px;padding-top: 36px' id='accCim'>" + globLang.youracc + "</div>";
        accDiv1 += "<div style='background-color: #ffffff;padding-left: 36px;padding-right: 36px'><div style='border-top-style: solid;border-top-width: 1px;border-top-color:#444444' ></div></div>";

        var ereSor1 = "<tr><td id='usntd' >" + globLang.named + "</td><td style='text-align: right' >" + usNN + "</td></tr>";
        ereSor1 += "<tr><td id='submtd' >" + globLang.subHw + "</td><td style='text-align: right' >" + USER.subm +  "</td></tr>";
        ereSor1 += "<tr><td id='opendatetd' >" + globLang.opndate + "</td><td style='text-align: right' >" + USER.opn +  "</td></tr>";
        var chec = "checked";
        if(USER.notif === "false")
        {
            chec = "";
        }
        var chec2 = "checked";
        if(USER.notif2 === "false")
        {
            chec2 = "";
        }
        ereSor1 += "<tr><td id='not1td' >" + globLang.getNotif + "</td><td style='text-align: right' ><input id='notifCB' type='checkbox' onclick='changeNotif(this, 6);' " + chec + " ><img id='notifLoader' style='visibility: hidden;width: 22px' src='IMAGES/loadersign.gif'> </td>";
        ereSor1 += "<tr><td id='not2td'>" + globLang.getNotif2 + "</td><td style='text-align: right' ><input id='notifCB2' type='checkbox' onclick='changeNotif(this, 7);' " + chec2 + " ><img id='notifLoader2' style='visibility: hidden;width: 22px' src='IMAGES/loadersign.gif'> </td>";

        ereSor1 += "<tr><td id='emailtd' >" + globLang.mailadd + "</td><td style='text-align: right'><span style='position: relative;background-color: #ffffff' ><div id='mailCover' style='position: absolute;background-color: #ffffff;color:#1a6cfb;top:0;left:0;width: 100%;height: 100%;cursor: pointer' onclick='toggleCover(" + '"' +  'mailCover' + '"' +");' >" + globLang.show + "</div><span id='accMailAdd' onclick='toggleCover(" + '"' +  'mailCover' + '"' +");' >" + USER.mai +  "</span><span style='color: #1a6cfb;cursor: pointer' onclick='toggleCover(" + '"' +  'modMailDiv' + '"' +");' >" + globLang.modif + "</span></span></td></tr>";


        ereSor1 += "<tr><td style='color:#1a6cfb;cursor: pointer' onclick='toggleCover(" + '"' +  'modPassDiv' + '"' +");' id='pwchtd' >" + globLang.changPw + "</td><td style='text-align: right' >" + "" +  "</td></tr>";

        var macTab = accDiv1 + "<table id='accDataTable' style='padding-top: 12px' >" + ereSor1 + "</table>";

        // CHANGE MAIL DIV

        var changeMailDiv = "<div id='modMailDiv' style='display: none;width: 100%;background-color: #ffffff;padding-bottom: 12px' >";
        changeMailDiv += "<div style='margin-left: 48px;margin-right: 36px;background-color: #cecece;padding-bottom: 12px' >";
        changeMailDiv += "<div style='text-align: right;padding-top: 4px;padding-bottom: 4px' ><span class='closeButt' onclick='toggleCover(" + '"' +  'modMailDiv' + '"' +");' >X</span></div>";

        changeMailDiv += "<div style='padding-top: 12px;padding-left: 36px;padding-right: 36px;color: #00a100;font-family: Arial, sans-serif' id='chMailDiv' >" + globLang.changMail + "</div>";
        changeMailDiv += "<div style='padding-left: 36px;padding-top: 8px;padding-right: 36px;' id='ujmaildiv' >" + globLang.newMail + "</div>";
        changeMailDiv += "<input style='margin-left: 36px' type='text' id='ujEmail' onkeyup='sendUjMail(event, 5);'  ><span class='sendButt' style='margin-left: 4px' onclick='sendInfo(5)' id='mailChSpan' >" + globLang.ment + "</span>";


        changeMailDiv += "<div id='systemMessage1' style='padding-top: 8px;margin-left: 36px' >??</div>";

        changeMailDiv += "</div></div>";

        // CHANGE PASSWORD DIV
        var changePassw = "<div id='modPassDiv' style='display: none;width: 100%;background-color: #ffffff;padding-bottom: 12px' >";
        changePassw += "<div style='margin-left: 48px;margin-right: 36px;background-color: #cecece;padding-bottom: 12px' >";
        changePassw += "<div style='text-align: right;padding-top: 4px;padding-bottom: 4px' ><span class='closeButt' onclick='toggleCover(" + '"' +  'modPassDiv' + '"' +");' >X</span></div>";

        changePassw += "<div style='padding-top: 12px;padding-left: 36px;padding-right: 36px;color: #00a100;font-family: Arial, sans-serif'>" + globLang.changPassw + "</div>";
        changePassw += "<div style='padding-left: 36px' id='ujpwdiv' >" + globLang.ujpw + "</div>";
        changePassw += "<input style='margin-left: 36px' type='text' id='newPassword1'>";
        changePassw += "<div style='padding-left: 36px' id='pwconf' >" + globLang.confirm + "</div>";
        changePassw += "<input style='margin-left: 36px' type='text' id='newPassword2' onkeyup='checkNewPw(event, 4);' ><span id='azOk' >NO</span>";
        changePassw += "<span class='sendButt' style='margin-left: 4px' onclick='sendInfo(4)' id='mailMent' >" + globLang.ment + "</span>";
        changePassw += "<div style='padding-left: 36px' id='uzi4'>???</div>";

        changePassw += "</div></div>";


        macTab += changeMailDiv + changePassw;

        macTab += "<div class='kisCim' style='padding-left: 36px;padding-right: 36px;background-color: #ffffff;padding-top: 24px' id='resultsDiv'>" + globLang.results + "</div>";
        macTab += "<div style='background-color: #ffffff;padding-left: 36px;padding-right: 36px'><div style='border-top-style: solid;border-top-width: 1px;border-top-color:#444444' ></div></div>";
        macTab += "<table style='padding-left: 36px;padding-right: 36px;padding-top: 12px;background-color: #ffffff;width: 100%' >" + mac1 + mac2 + mac3 + "</table>";



        var deletDiv = "<div style='padding: 36px;background-color: #ffffff' >";
        deletDiv += "<div id='delDiv1'><div style='color: #1a6cfb;cursor: pointer' onclick='waitDelete()' id='delAccDiv' >  " + globLang.delacc + "</div></div>";
       // deletDiv += "<button class='Button2' style='border-style: none;background-color: #ff0000' onclick='waitDelete()' >" + globLang.del + "</button>";
        deletDiv += "<div style='text-align: center;display: none' id='waiter' ><div id='waitdiv' >" + globLang.delWait + "</div><img src='IMAGES/loadersign.gif' /></div>";
        var waiti = "waiter";
        deletDiv += "<div id='realDelete' style='display: none;text-align: center' ><div style='padding: 4px;color: #aa0000;font-family: Arial, sans-serif' id='finalDelDiv' >" + globLang.finalDel + "</div><button class='Button2' style='background-color: #00a100;color: #ffffff' onclick='notDel();' >" + globLang.cancelit + "</button><button class='Button2' style='color:#ffffff;background-color: #ff0000' onclick='getAccount(1)' >" + globLang.realDel + "</button></div>";
        deletDiv += "</div>";

        document.getElementById("workTop1").innerHTML = "<div class='keretDiv' >" + macTab + deletDiv + "</div>";
    }
    else if(charZero == "D")
    {

        document.getElementById("uzenet").innerHTML = "Fikókját töröltük.";
        document.getElementById("tempida").value = "0";

        document.getElementById("inName").value = "0";
        document.getElementById("inPass").value = "0";

        document.getElementById("wrapper1").style.display = "none";
        document.getElementById("wrapper_login").style.display = "block";


    }
    else
    {
        toLogOut(globLang.logInAgain);
    }
   // document.getElementById("workTop1").innerHTML =  mac + "<table style='padding: 36px;background-color: #ffffff;width: 100%' >" + total + "</table>";
}

function changeNotif(elem, acode)
{
    if(acode == 6)
    {
        document.getElementById("notifLoader").style.visibility = "visible";
    }
    else
    {
        document.getElementById("notifLoader2").style.visibility = "visible";
    }

    if(elem.checked)
    {
        sendInfo(acode, true);
    }
    else
    {
        sendInfo(acode, false);
    }
}


function waitDelete()
{
    document.getElementById("waiter").style.display = "block";
    setTimeout(function() {
        document.getElementById("delDiv1").style.display = "none";
        document.getElementById("waiter").style.display = "none";
        document.getElementById("realDelete").style.display = "block";

    }, 5000);
}

function sendUjMail(e, c)
{
    if(e.keyCode == 13)
    {
        sendInfo(c);
    }
}

function checkNewPw(e, c)
{
    var apw1 = document.getElementById("newPassword1").value.trim();
    var apw2 = document.getElementById("newPassword2").value.trim();

    var azOk = document.getElementById("azOk");

    if(apw1 == apw2)
    {
        azOk.innerHTML = "OK";
        azOk.style.color = "#00ff00";
    }
    else
    {
        azOk.innerHTML = "NO";
        azOk.style.color = "#ff0000";
    }

    if(e.keyCode == 13)
    {
        sendInfo(c);
    }

}

function toggleCover(divname)
{
    var cover = document.getElementById(divname);
    if(cover.style.display == "none")
    {
        cover.style.display = "block";
        var getInp = cover.getElementsByTagName("input");
        if(getInp.length > 0)
        {
            getInp[0].focus();
        }
       // document.getElementById("ujEmail").focus();
    }
    else
    {
        cover.style.display = "none";
    }
}


function notDel()
{
    document.getElementById("realDelete").style.display = "none";
    document.getElementById("delDiv1").style.display = "block";
}

function sendInHibatlan(hibatlan)
{
    var userN = document.getElementById("inName").value.trim();
    var userP = document.getElementById("inPass").value.trim();
    var userTi = document.getElementById("tempida").value.trim();

    var code = 1;
    if(hibatlan)
    {
        code = 2; // ha hibatlan, akkor code 2, hogy ne csak azt írjuk be, hogy láttuk (viewed)
    }
   // alert(globFeladatID);
    var kuld = "user=" + userN + "&pw=" + userP + "&tempid=" + userTi + "&taskID=" + globFeladatID + "&code=" + code; // if code 1, just give one more bear etc

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {


            if(hibatlan)
            {
                einstein(); // ha hibatlan, Einstein bólogat
            }
          //  alert(this.responseText);
        }
    };

    xhttp.open("POST", "TEACHER/ajaxSubmitHW.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(kuld);
}


//  VONALAS NYELVTANI FELADATOK DOLGAI

function getMusterVonalFile(apath, useTips, teacherRemakrs, procFun)
{
//  alert(apath + "  " + useTips);
putinLoader();
    var tempid = document.getElementById("tempida").value.trim();

  var kuld = "taskCime=" + apath + "&tempid=" + tempid;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
            offLoadeer();
         // alert(this.responseText);
          var resp = this.responseText;
          if(resp.charAt(0) == "1")
          {
              toLogOut(globLang.logInAgain);
          }
          else
          {
              procFun(resp, useTips, teacherRemakrs);
          }

      }
  };

  xhttp.open("POST", "MAJAXOK/ajaxGramSender2.php", true); // solu sent too
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(kuld);

}


var procVocCorrected = function(muster, userTippek, tRemarks)
{

    popupVon = null;

    globObj = JSON.parse(muster);
    GLOBTEACHREMARKS = tRemarks.split('_');
    var sentences = globObj.contents;
    glogTaskCim = globObj.title;
    var cime = globObj.title;
    var instr = globObj.instructions;

    var tabrow = "";
    var userTips = userTippek.split('_');
    var corrSolu = 0;
    var incorrect = 0;
    var notProvided = 0;

    var wordArr = [];

    for (var i = 0; i < sentences.length; i++) {
        var egyWord = {};

        var egysor = "";

        var corr = "";
        var sti = "";
        var stiin = "";

        var notprov = false;

        if (userTips[i] == i) {

            sti = "style='background-color:#ffffff'";
            stiin = "style='color:#00bb00;font-weight:bold'";
            corrSolu++;
        }
        else {
            if(userTips[i] == "GGG")
            {
                notProvided++;
                notprov = true;
            }

            sti = "style='background-color:#efefef;color:#aa0000;cursor:pointer'";
            stiin = "style='color:#dd0000;font-weight:bold'";
            incorrect++;
        }
        if(GLOBTEACHREMARKS[i] != "-")
        {
          corr = "<span class='remi' onclick='showRem("+ i +")' >" + globLang.remark + "</span>";
        }
        else {
          corr = "";
        }

       // fill in with the correct words
        //var wor1 = " " + sentences[i].go1.trim() + "&nbsp;";
       // var wor2 = sentences[i].go2.trim();

        // fill in with user tipps
        if(!notprov)
        {
            var s = parseInt(userTips[i]);

            var wor1 = sentences[s].go1.trim();
            var elozobetu = sentences[i].gel.trim();
            var lastC = elozobetu.charAt(elozobetu.length-1);

            if(lastC === "" || lastC === "." || lastC === "?" || lastC === "!")
            {
                 wor1 = wor1.charAt(0).toUpperCase() + wor1.slice(1).toLowerCase() + "&nbsp;";
            }
            else
            {
                 wor1 = " " + sentences[s].go1.trim() + "&nbsp;";
            }


            var wor2 = sentences[s].go2.trim();

            if(wor2 != "")
            {
                wor2 = " " + wor2 + "&nbsp;";
            }
        }
        else
        {
            wor1 = " -- <i>" + globLang.noanswer + " </i>--" + "&nbsp;";
            wor2 = "";
            stiin = "style='color:#ff0000'";
        }


        egyWord.w1 = sentences[i].go1;
        egyWord.w2 = sentences[i].go2;
        var fullCorr = sentences[i].gel.trim() + "<span style='color: #00ce00;font-weight: bold'> " + sentences[i].go1 + "</span> " + sentences[i].ge2.trim() + " <span style='color: #00ce00;font-weight: bold'>" + sentences[i].go2 + " </span>" + sentences[i].ge3.trim();

        egyWord.id = i;
        var mm = sentences[i].meaning;
        if(mm.trim() == "")
        {
            mm = globLang.nomeaning;
        }
        egyWord.mean = mm;


        egysor += sentences[i].gel.trim() + " <span onclick='showCorrWord(" + i + ", this, event);' class='tooltip2' " + stiin + " >" + wor1 + "<div id='pop_" + i + "' class='tooltipVocab' >" + fullCorr + "</div></span>" + sentences[i].ge2.trim() + " <span class='beirtWord' " + stiin + " >" + wor2 + "</span>" + sentences[i].ge3.trim();

        wordArr.push(egyWord);


        var sorS = i + 1;
        tabrow += "<tr><td colspan='2' ><div class='sorexp' style='height: 0;background-color: tan'><div class='vonalasExp' id='tool2" + i + "' >" + fullCorr + "</div></div></td></tr>";
        tabrow += "<tr><td style='vertical-align: top' >" + sorS + ".</td><td>" + egysor + "</td><td style='text-align: center' id='wo_"+ i +"'  " + sti + " >" + corr + "</td></tr>";



    }


  //  wordArr = wordArr.sort(function(a, b) {return a.w1 > b.w1});

    wordArr.sort(function( a , b ){
        return a.w1 > b.w1 ? 1 : -1;
    });

    var wordSpans = "";

    for(var k = 0;k<wordArr.length;k++)
    {
        var egySpan = "<div class='words' onclick = 'ame.innerHTML = this.id;'  id='" + wordArr[k].mean + "' >" + wordArr[k].w1 + " " + wordArr[k].w2 + "</div>";
        wordSpans = wordSpans + egySpan;
    }

    var dashbo2 =  giveOldHwDas();
    var oss = corrSolu + incorrect;
    var inst = "<div class='taskInstFrame'><div class='tabTitle' >" + cime +  "</div><div class='tabInstru' >" + instr + "</div><div>" + wordSpans + "</div><div><div style='width: 8px;height: 8px;background-color: #00ba00;display: inline-block;margin-right: 8px' ></div><span id='theMeaning'></span></div></div>";

    var eredDiv = "<div class='kisParal' ><span class='resultInfo' >Correct: " + corrSolu +" / "+ oss +"</span> | <span class='resultInfoIncorr'> Incorrect: "+ incorrect + "</span> of which not answered: " + notProvided + "</div>";
    var teachMessDiv = "<div class='techerMessage' style='margin-left:36px' >" + getMessage() + "</div>";
    document.getElementById("workTop1").innerHTML = "<div class='parallaxOuterDiv' >" + dashbo2 + inst + "<div class='parallaxDiv' ><table style='width: 100%;background-color: #ffffff;padding-left: 36px;padding-right: 36px;padding-top: 20px;padding-bottom: 12px' >" + tabrow + "</table>" + eredDiv + teachMessDiv + giveTRem() + "</div></div>";
    ame = document.getElementById("theMeaning");
    if(!getViewed()) // ha még nem tekintettük meg, akkor send in: it is viewed by user
    {
        if(incorrect == 0)
        {
            if(!isRedone())
            {
                sendInHibatlan(true);
            }
            else
            {
                sendInHibatlan(false);
            }

        }
        else
        {
            // alert("send view");
            sendInHibatlan(false);
        }
    }

};

function giveTRem()
{
    return "<div id='theRemark'> </div>";
}
function showCorrWord(ss, elem, e)
{
    e.stopPropagation();

    if(popupVon != null)
    {
        document.getElementById(popupVon).style.visibility = "hidden";
    }

    var azid = "tool2" + ss;
    popupVon = azid;
    document.getElementById(azid).style.visibility = "visible";

    /*
    if(popupid.trim() != "")
    {
        var azelem = document.getElementById(popupid);
        if(azelem != null)
        {
            azelem.style.visibility = "hidden";
        }
    }

    var sentences = globObj.contents;

    var correctSol1 = sentences[ss].go1;
    var correctSol2 = sentences[ss].go2;
    var mean = sentences[ss].meaning;

    var kids = elem.children;

    popupid = kids[0].id;
  //  kids[0].innerHTML = correctSol1 + " " + correctSol2 + " = " + mean;
    kids[0].style.minWidth = "400px";

   // kids[0].style.whiteSpace = "normal";
    kids[0].style.visibility = "visible";
    */

}

var procABCcorrecte = function (muster, userTippek, tRemarks)
{

    popupVon = null;

    globObj = JSON.parse(muster);

    var sentences = globObj.contents;
    glogTaskCim = globObj.title;

    var userTips = userTippek.split('_');

    var teachRem = tRemarks.split('_');
    GLOBTEACHREMARKS = teachRem;

    var mondatSor = "";
    var corrN = 0;

    var noFillN = 0;

    for(var i = 0;i<sentences.length;i++)
    {

        // corrSolu.push(sentences[i].solu);
        var correctSol = sentences[i].solu + "";
        var kisSor = "";
        var egyMond = sentences[i].sentence;
        var corr = false;





            if(correctSol.indexOf(userTips[i]) !== -1)
            {
                corr = true;
                corrN++;
            }




        if(userTips[i] == "GGG")
        {
            noFillN++;
        }
        for(var s = 0;s<egyMond.length;s++)
        {

            var von = " _________ ";
            if(s == egyMond.length-1)
            {
                von = "";
            }
            kisSor = kisSor + egyMond[s] + von;
        }
        var sori = i+1;

        var expsor = "<tr><td colspan='2' ><div class='sorexp'  ><div class='vonalasExp' id='tool2" + i + "' ></div></div></td></tr>";
        mondatSor += expsor + "<tr><td  style='padding-top: 12px;vertical-align: top' >" + sori + ".</td><td style='padding-top: 12px' >" +  kisSor + "</td></tr>";

        // distracor choices

        var dist = sentences[i].distractors;
        var realDist = "";
        var distSor = "";
        var cc = userTips[i];
        for(var d = 0;d<dist.length;d++)
        {

            var kisDist = dist[d];
            for(var k = 0;k<kisDist.length;k++)
            {

                var usTip = "";
                var tick = "";
                if(cc == k)
                {
                    // usertip bold and blue
                    usTip = "style='color:#0000ff;font-weight:bold'";

                    if(corr)
                    {
                        tick = "<img src='IMAGES/tick.png' style='width:16px' >";
                        var incoClick = "onclick='explainABC(" + i + "," + k + ", event);'";
                    }
                    else
                    {
                        tick = "<img src='IMAGES/redex.png' style='width:12px' >";
                        incoClick = "onclick='explainABC(" + i + "," + k + ", event);'";
                    }
                }
                else
                {
                        usTip = "style='color:#111111;font-weight:normal'";
                    incoClick = "onclick='explainABC(" + i + "," + k + ", event);'";

                }

                if(correctSol == k)
                {
                    usTip = "style='color:#00bb00;font-weight:bold'";
                }

                var betu = String.fromCharCode(65 + k);

                realDist += "<td "+ usTip+" " + incoClick +" >" +  betu + ") " + kisDist[k] + tick + "</td>";
            }

        }

        var azok = "NO";
        var stil = "style='color:#aa0000'";
        if(corr)
        {
            azok = "OK";
            stil = "style='color:#00aa00'";
        }
        //  corr = "<span class='remi' >" + globLang.remark + "</span>";

        var megj = "";
        if(teachRem[i] != "-")
        {
            megj = "<span class='remi' onclick='showRem("+ i +");' >" + globLang.remark + "</span>";
        }

       // distSor = "<tr><td></td><td colspan='2' ><table style='width: 100%;table-layout: fixed' id='tab_" + i + "' ><tr>" + realDist + "</tr></table></td><td " + stil +" class='abcOK' >" + corr + "</td></tr>";

        distSor = "<tr><td></td><td ><table style='width: 100%;table-layout: fixed' id='tab_" + i + "' ><tr>" + realDist + "</tr></table></td></tr>";

        mondatSor = mondatSor + distSor;

    }

    var acim = "<div class='taskInstFrame'><div  class='tabTitle' >" + globObj.title + "</div>";
    var inst = "<div class='tabInstru'>" + globObj.instructions + "</div></div>";

    var incoN = sentences.length - corrN;
    // var stats = "<tr><td colspan='2' ><table><tr><td>Correct: "+ corrN + " Incorrect: " + incoN + " of which unanswered: "+ incoN +"</td></tr></table></td></tr>";

    var foTab = "<table class='mondTabPCorrected' > " +  mondatSor +  "</table>";



  //  var apages = getOldPage();
  //  var dashbo2 = "<table class='dashBoartTable'><tr> <td><span id='pages'>" + apages[0] + "/" + apages[1] +  "</span></td> <td style='text-align: right' ><span id='backButt' class='dashBoardButt1' onclick='oldHwNext(-1)' >" + globLang.back + "</span><span id='nextButt' onclick='oldHwNext(1)' class='dashBoardButt2' >" + globLang.next + "</span></td> </tr></table>";

    var dashbo2 =  giveOldHwDas();

    var oss = sentences.length;
    var eredDiv = "<div class='kisParal' ><span class='resultInfo' >Correct: "+ corrN +" / "+ oss +"</span> | <span class='resultInfoIncorr'> Incorrect: "+ incoN + "</span> of which not answered: " + noFillN + "</div>";

    var mesDiv = "<div class='techerMessage' style='margin-left: 36px;margin-right: 36px' >" + getMessage() + "</div>";
    var sem = "";


    document.getElementById("workTop1").innerHTML = "<div class='parallaxOuterDiv' >" + dashbo2 + acim + inst + "<div class='parallaxDiv'>" + foTab +  eredDiv + mesDiv + "</div></div>";

    if(!getViewed()) // ha még nem tekintettük meg, akkor send in: it is viewed by user
    {
        if(incoN == 0)
        {
            if(!isRedone())
            {
                sendInHibatlan(true);
            }
            else
            {
                sendInHibatlan(false);
            }
        }
        else
        {
            // alert("send view");
            sendInHibatlan(false);
        }
    }

};

function explainABC(ss, s2, e)
{
    e.stopPropagation();

    if(GLOBTEACHREMARKS[ss] != "-")
    {
        var trem = GLOBTEACHREMARKS[ss];
    }
    else
    {
        trem = "";
    }

    var getRemark = globObj.contents[ss].remarks[0];
    var bele = getRemark[s2];

    if(bele.trim() == "C")
    {
        bele = "Correct solution.";
        trem = "";
    }

    if(trem.trim() != "")
    {
        bele += "<br />" + "*" + trem;
    }
    var ide = "tool2" + ss;
    var azelem = document.getElementById(ide);
    azelem.innerHTML = bele;

    clrPopups();

    popupVon = ide;

    azelem.style.visibility = "visible";


}
function closRem(elem)
{
    elem.parentElement.parentElement.innerHTML = "";
}

function showRem(ss)
{
   // alert(GLOBTEACHREMARKS[ss])
    document.getElementById("theRemark").innerHTML = "<div style='text-align: right' ><span onclick='closRem(this);' class='closeX' >x</span></div> <div>" + GLOBTEACHREMARKS[ss] + "</div>";
}



var procGram6corrected = function(muster, userTippek, teacherRemakrs)
{
    var TRemarks = teacherRemakrs.split('_');
    GLOBTEACHREMARKS = TRemarks;

    popupVon = null;
    var tanarJav = GLOBVONALASTEACHER.split('_');
    var uTipps = userTippek.split('_');
    var corrNum = 0;
    var incorNum = 0;
    var notFilled = 0;


    globObj = JSON.parse(muster);

    var cime = globObj.title;
    var instru = globObj.instructions;

    var vonal = "";
    var contents =  globObj.contents;

    var longS = "";
    for(var i = 0;i<contents.length;i++)
    {
        if(TRemarks[i] != "-" && TRemarks[i] != "")
        {
           // var remarkStyle = "<span style='background-color: #3e9fd4;padding: 3px;color:#ffffff;font-weight: bold' >!</span>";
            remarkStyle = "<div class='arrow2' onclick='directuser();' ></div>";

        }
        else
        {
            remarkStyle = "";
        }
        longS += "<tr><td colspan='2' >" + parseInt(i+1) + ". " + contents[i].longsent + "</td></tr>";
        if(contents[i].starter.trim() !== "")
        {
            longS += "<tr><td colspan='2' >" + contents[i].starter + "</td></tr>";
        }

        if(uTipps[i] !== "GGG")
        {
            if(tanarJav[i] === "OK")
            {
                corrNum++;
                vonal = "<textarea readonly onclick='gram6expla(" + i + ", event);' style='width:100%;resize: none; font-weight: bold;color:#00bb00;font-size:22px;font-family: " + '"' + 'Nanum Pen Script' + '"' + " ' >" + uTipps[i] + "</textarea>";
            }
            else
            {
                incorNum++;
                vonal = "<textarea readonly  onclick='gram6expla(" + i + ", event);' style='width:100%;resize: none;font-weight: bold;color:#ff0000;font-size:22px;font-family: " + '"' + 'Nanum Pen Script' + '"' + " '>" +  uTipps[i] + "</textarea>";
            }
        }
        else
        {
            incorNum++;
            notFilled++;
            vonal = "<textarea readonly  onclick='gram6expla(" + i + ", event);' style='width:100%;resize: none;font-weight: bold;color:#444444'>" + globLang.noanswer + "</textarea>";
        }

        longS +=  "<tr><td colspan='2' ><div class='sorexp' ><div class='vonalasExp'  id='tool2" + i + "'></div></div></td></tr>";
        longS += "<tr style='vertical-align: top' ><td style='width: 6px' >" + remarkStyle + "</td><td>" + vonal + "</td></tr>";
    }

    var eredDiv = "<div class='kisParal' ><span class='resultInfo' >Correct: "+ corrNum +" / "+ contents.length +"</span> | <span class='resultInfoIncorr'> Incorrect: "+ incorNum + "</span> of which not answered: " + notFilled + "</div>";

    var textbele = "<table style='width: 100%;padding-left: 36px;padding-right: 36px;margin-top: 24px;margin-bottom: 24px' >" + longS + "</table>";
    var inst = "<div class='taskInstFrame'><div class='tabInstru'>" + instru + "</div><div class='tabTitle' >" + cime + "</div></div>";
    var teachMessDiv = "<div class='techerMessage' style='margin-left:36px' >" + getMessage() + "</div>";
    document.getElementById("workTop1").innerHTML = "<div class='parallaxOuterDiv'>" + giveOldHwDas() + inst + "<div class='parallaxDiv'>" + textbele + eredDiv + teachMessDiv + "</div></div>";


    if(!getViewed()) // ha még nem tekintettük meg, akkor send in: it is viewed by user
    {
        if(incorNum == 0)
        {
            //alert("send viewed and hibátlan");
            if(!isRedone())
            {
                sendInHibatlan(true);
            }
            else
            {
                sendInHibatlan(false);
            }
        }
        else
        {
            // alert("send view");
            sendInHibatlan(false);
        }
    }


};

function gram6expla(ss, e)
{
    e.stopPropagation();

    if(popupVon != null)
    {
        document.getElementById(popupVon).style.visibility = "hidden";
    }
    popupVon = "tool2" + ss;

    var tarti =  globObj.contents[ss].alters;
    var bele = "";
    var vege = " - ";
    for(var i = 0;i<tarti.length;i++)
    {
        if(i == tarti.length-1)
        {
           vege = "";
        }
        bele += tarti[i] + vege;
    }

    if(GLOBTEACHREMARKS[ss] != "-" && GLOBTEACHREMARKS[ss] != "")
    {
        bele += "<br />" + "<span style='color:#00fe00;' >" + GLOBTEACHREMARKS[ss] + "</span>";
    }

    var pupup = document.getElementById("tool2" + ss);

    pupup.innerHTML = bele;
    pupup.style.visibility = "visible";
}

var procGram5corrected = function(muster, userTippek, teacherRemakrs)
{
    var TRemarks = teacherRemakrs.split('_');
    GLOBTEACHREMARKS = TRemarks;

    popupVon = null;
    var tanarJav = GLOBVONALASTEACHER.split('_');
    var userTipArr = userTippek.split('_');
    var corrNum = 0;
    var incorNum = 0;
    var notFilled = 0;



    globObj = JSON.parse(muster);

    var contentsPart = globObj.contents;
    var cime = globObj.title;
    var instru = textDeco(globObj.instructions);

    var awords = contentsPart.words;
    awords.sort();

    var wordBox = "";

    for(var i = 0;i<awords.length;i++)
    {
        wordBox += "<div class='words' style='background-color: #c80000;cursor: default' >" + awords[i] + "</div>";
    }

    var wordDiv = "<div style='background-color: #c9f6fb;padding-left: 36px;padding-right: 36px;padding-top: 12px;padding-bottom: 12px' >" + wordBox + "</div>";

    var atext = contentsPart.text;
    var textbele = "";
    /*
    for(i = 0;i<atext.length;i++)
    {
        if(i < atext.length-1)
        {
            if(userTipArr[i] != "GGG")
            {
                if(tanarJav[i] == "OK")
                {
                    corrNum++;
                    var corCol = "style='color:#00bb00;font-weight:bold;font-size:20px;font-family: " + '"' + 'Nanum Pen Script' + "'" + '"';
                    var vonal = "<span " + corCol + " >" + userTipArr[i] + "</span>";
                }
                else
                {
                    corCol = "style='cursor:pointer;color:#ff0000;font-weight:bold;font-size:20px;font-family: " + '"' + 'Nanum Pen Script' + "'" + '"';
                    vonal = "<span " + corCol + " onclick='gram5Show(" + i + ", event);' >" + userTipArr[i] + "</span>";
                    incorNum++;
                }

            }
            else
            {
                vonal = "<span style='font-weight: bold;color: #ff0000;font-style: italic;cursor:pointer' onclick='gram5Show(" + i + ", event);' >--" + globLang.noanswer + "--</span>";
                notFilled++;
                incorNum++;
            }

        }
        else { vonal = "" ;}
        textbele += atext[i] + vonal;

    }
    */
    var numbered = false;
    if(atext.includes("#"))
    {
        numbered = true;
    }

    var tabSor = "";
    if(numbered) // we have to number the sentences line by line
    {
        var senti = atext.split("#");
        var tu = 0;
        for(var t = 0;t<senti.length;t++)
        {

            var monDarab = senti[t].split("_");

            var mondsor = "";
            for(var m = 0;m<monDarab.length;m++)
            {
                if(m < monDarab.length-1)
                {
                    if(userTipArr[tu] != "GGG")
                    {
                        if(tanarJav[tu] == "OK")
                        {
                            corrNum++;
                            var corCol = "style='color:#00bb00;font-weight:bold;font-size:20px;font-family: " + '"' + 'Nanum Pen Script' + "'" + '"';
                            var vonal = "<span " + corCol + " >" + userTipArr[tu] + "</span>";
                        }
                        else
                        {
                            corCol = "style='cursor:pointer;color:#ff0000;font-weight:bold;font-size:20px;font-family: " + '"' + 'Nanum Pen Script' + "'" + '"';

                            vonal = "<span " + corCol + " id='" + t + "-" + tu + "'  onclick='gram5Show2(this, event);' >" + userTipArr[tu] + "</span>";
                            incorNum++;
                        }

                       // vonal = "<span class='answerWord' style='font-weight: bold;padding-left: 12px;padding-right: 12px;border-bottom-style: solid;border-bottom-width: 1px;border-bottom-color: #111111;color:#00afff;font-size:22px;font-family: " + '"' + 'Nanum Pen Script' + '"' + " '>" + userTipArr[tu] + "</span>";
                        tu += 1;
                    }
                    else
                    {

                        vonal = "<span style='font-weight: bold;color: #ff0000;font-style: italic;cursor:pointer' id='" + t + "-" + tu + "' onclick='gram5Show2(this, event);' >--" + globLang.noanswer + "--</span>";
                        notFilled++;
                        incorNum++;

                        //vonal = "<span style='padding-left: 12px;padding-right: 12px;padding-top: 4px;color:#ff0000' >--" + globLang.noanswer + "--</span>";
                        tu += 1;
                    }

                }
                else
                {
                    vonal = "";
                }



                mondsor += monDarab[m] + vonal;
            }

            tabSor +=  "<tr><td colspan='2' ><div class='sorexp' ><div class='vonalasExp'  id='tool2" + t + "'></div></div></td></tr>";
            tabSor += "<tr><td style='vertical-align: top' >" + parseInt(t+1) + ".</td><td>" + mondsor + "</td></tr>";
        }
    }
    else // coherent text
    {

        var nagytext = atext.split("_");
        var textsor = "";
        for(t = 0;t<nagytext.length;t++)
        {

            if(userTipArr[t] != "GGG")
            {
                if(tanarJav[t] == "OK")
                {
                    corrNum++;
                    var corCol = "style='color:#00bb00;font-weight:bold;font-size:20px;font-family: " + '"' + 'Nanum Pen Script' + "'" + '"';
                    var vonal = "<span " + corCol + " >" + userTipArr[t] + "</span>";
                }
                else
                {
                    corCol = "style='cursor:pointer;color:#ff0000;font-weight:bold;font-size:20px;font-family: " + '"' + 'Nanum Pen Script' + "'" + '"';
                    vonal = "<span " + corCol + " onclick='gram5Show(" + t + ", event);' >" + userTipArr[t] + "</span>";
                    incorNum++;
                }


                //vonal = "<span class='answerWord' style='font-weight: bold;padding-left: 12px;padding-right: 12px;border-bottom-style: solid;border-bottom-width: 1px;border-bottom-color: #111111;color:#00afff;font-size:22px;font-family: " + '"' + 'Nanum Pen Script' + '"' + " '>" + userTipArr[t] + "</span>";
            }
            else
            {
                vonal = "<span style='padding-left: 4px;padding-right: 4px;padding-top: 4px;color:#ff0000;cursor:pointer' onclick='gram5Show(" + t + ", event);' >--" + globLang.noanswer + "--</span>";
            }
            if(t == nagytext.length-1)
            {
                vonal = "";
            }


            textsor += nagytext[t] + vonal;
        }

        tabSor = "<tr><td><div class='sorexp' ><div class='vonalasExp'  id='tool2'></div></div></td></tr>";
        tabSor += "<tr><td>" + textsor + "</td></tr>";
      //  var expSor =  "<tr><td><div class='sorexp' ><div class='vonalasExp'  id='tool2'></div></div></td></tr>";
    }






    textbele = "<table style='margin-left: 36px;margin-right: 36px;margin-top: 24px;margin-bottom: 24px' >" + tabSor + "</table>";



    var eredDiv = "<div class='kisParal' ><span class='resultInfo' >Correct: "+ corrNum +" / "+ awords.length +"</span> | <span class='resultInfoIncorr'> Incorrect: "+ incorNum + "</span> of which not answered: " + notFilled + "</div>";

    var teachMessDiv = "<div class='techerMessage' style='margin-left:36px' >" + getMessage() + "</div>";
    var inst = "<div class='taskInstFrame'><div class='tabTitle' >" + cime + "</div><div class='tabInstru'>" + instru + "</div></div>";
    document.getElementById("workTop1").innerHTML = "<div class='parallaxOuterDiv'>" + giveOldHwDas() + inst + "<div class='parallaxDiv'>" + wordDiv + textbele + eredDiv + teachMessDiv + "</div></div>";

    if(!getViewed()) // ha még nem tekintettük meg, akkor send in: it is viewed by user
    {
        if(incorNum == 0)
        {
            if(!isRedone())
            {
                sendInHibatlan(true);
            }
            else
            {
                sendInHibatlan(false);
            }
        }
        else
        {
            // alert("send view");
            sendInHibatlan(false);
        }
    }
};


function gram5Show(ss, e)
{
    e.stopPropagation();
    var apup = document.getElementById("tool2");

    if(GLOBTEACHREMARKS[ss] != "-")
    {
        var trem = "* " + GLOBTEACHREMARKS[ss];
    }
    else {trem = "";}

    apup.innerHTML = "Corr.: " + globObj.contents.alterns[ss].replace("~", " - ") + "<br />" + trem;
    apup.style.visibility = "visible";
    popupVon = "tool2";


}

function gram5Show2(ss, e)
{
    e.stopPropagation();

    var szamok = ss.id.split("-");
    var azid = "tool2" + szamok[0];
    var apup = document.getElementById(azid);

    if(GLOBTEACHREMARKS[szamok[1]] != "-")
    {
        var trem = "* " + GLOBTEACHREMARKS[szamok[1]];
    }
    else {trem = "";}


    if(popupVon != null)
    {
        document.getElementById(popupVon).style.visibility = "hidden";
    }

    apup.innerHTML = "Corr.: " + globObj.contents.alterns[szamok[1]].replace("~", " - ") + "<br />" + trem;
    apup.style.visibility = "visible";
    popupVon = azid;


}

function directuser() {
    alert(globLang.directUser);
}

var GLOBTEACHREMARKS;
var procVonalasCorrected = function (muster, userTippek, teacherRemakrs)
{

    var TRemarks = teacherRemakrs.split('_');
    GLOBTEACHREMARKS = TRemarks;

    popupVon = null;
  var userTipArr = userTippek.split('_');
  var tanarJav = GLOBVONALASTEACHER.split('_');
    var corrNum = 0;
    var incorNum = 0;
    var notFilled = 0;

    for(var k = 0;k<tanarJav.length-1;k++)
    {
        if(tanarJav[k] == "OK")
        {
            corrNum++;
        }
        else
        {
            incorNum++;
        }

    }
//  alert(userTipArr.length);
    if(muster.charAt(0) == "1")
    {
        alert("ERROR: different id. Log out and then log in again.");
        return;
    }
  globObj = JSON.parse(muster);



   // hwobj = JSON.parse(muster);

  var sentencArr = globObj.contents;
  //alert(sentencArr.length);
  var sentences = "";
  Contents = globObj.contents;
  glogTaskCim = globObj.title;
    var instrukc = globObj.instructions.replace(/B1/g, '<b>');
    instrukc = instrukc.replace(/B2/g, '</b>');
  var sor = "";
  var fullSor = "";

    var oss = 0;

    var emptyOK = false;
    instrukc.includes("nothing") ?  emptyOK = true : emptyOK = false;


  var stil = "style='border-style:none;border-bottom-style:solid;border-width:1px;padding-left:4px;padding-right:4px;text-align:center;font-weight:bold;color:#00aa00'";
  var z = 0;
  for(var i = 0;i<sentencArr.length;i++)
  {


      sor = "";
      sentences = "";
      for(var s = 0;s<Contents[i].sentence.length;s++)
      {
          var cori = true;
          var corCol = "style='color:#00bb00;font-weight:bold;font-size:20px;font-family: " + '"' + 'Nanum Pen Script' + "'" + '"';
          if(tanarJav[z] !== "OK")
          {
              cori = false;
              corCol = "style='color:#ff0000;font-weight:bold;font-size:20px;font-family: " + '"' + 'Nanum Pen Script' + "'" + '"';
          }

          var beir = "";
          if(userTipArr[z] === "GGG")
          {

              if(emptyOK && cori)
              {
                      beir = "---";
                      corCol = "style='color:#00bb00'";
              }
              else
              {
                  beir = "<i>" + globLang.noanswer + "</i>";

                  if(s < Contents[i].sentence.length-1)
                  {
                      notFilled++;
                  }
                  corCol = "style='color:#ff0000'";
              }


          }
          else {
              beir = userTipArr[z];
          }

          if(TRemarks[z] !== "-" && TRemarks[z] !== "")
          {
              triang = "<div class='arrow2'></div>";
          }
          else
          {
              triang = "";
          }

         // var vonal = "<span class='tooltip2' onclick='reviewVonalas(this, event);' id='"+ z +"' ><span id='" + i + "-" + s + "'  class='vonalasCorr' " + corCol + " >" + triang + beir + "</span><div class='tooltipVocab' id='tool" + z + "' ></div></span>";
          var vonal = "<span class='tooltip2' onclick='reviewVonalas(this, event);' id='"+ i + "-" + z +"' ><span id='" + i + "-" + s + "'  class='vonalasCorr' " + corCol + " >" + triang + beir + "</span></span>";
          if(s === Contents[i].sentence.length-1)
          {
              vonal = "";
          }
          else {
              z++;
              oss++;
          }
          sentences = sentences + Contents[i].sentence[s] + vonal;
      }
      var sorszam = parseInt(i+1);
      sor = "<tr><td colspan='2' ><div class='sorexp' ><div class='vonalasExp' id='tool2" + i + "' ></div></div></td></tr>";
      sor += "<tr><td style='vertical-align: top;padding-top: 4px' >" + sorszam + ".</td><td style='vertical-align: top;padding-left: 8px' >" + sentences + "</td></tr>";
      fullSor = fullSor + sor;
  }

    var inst = "<div class='taskInstFrame'><div class='tabTitle'>" + glogTaskCim + "</div><div class='tabInstru' >" + instrukc + "</div></div>";




   // var messSor = "<tr><td colspan='2' class='techerMessage'>" + getMessage() + "</td></tr>";
  var fullTable = "<table class='taskTable' cellpadding='0' cellspacing='0' style='margin-bottom: 16px' >" + fullSor + "</table>";


    // var apages = getOldPage();
  // var dashbo2 = "<table class='dashBoartTable'><tr> <td><span id='pages'>" + apages[0] + "/" + apages[1] +  "</span></td> <td style='text-align: right' ><span id='backButt' class='dashBoardButt1' onclick='oldHwNext(-1)' >" + globLang.back + "</span><span id='nextButt' onclick='oldHwNext(1)' class='dashBoardButt2' >" + globLang.next + "</span></td> </tr></table>";
    var dashbo2 =  giveOldHwDas();

    var eredDiv = "<div class='kisParal' ><span class='resultInfo' >Correct: "+ corrNum +" / "+ oss +"</span> | <span class='resultInfoIncorr'> Incorrect: "+ incorNum + "</span> of which not answered: " + notFilled + "</div>";

  document.getElementById("workTop1").innerHTML = "<div class='parallaxOuterDiv'>" + dashbo2 + inst + "<div class='parallaxDiv'>" + fullTable + eredDiv + "</div></div>";

    if(!getViewed()) // ha még nem tekintettük meg, akkor send in: it is viewed by user
    {
        if(incorNum == 0)
        {
            if(!isRedone())
            {
                sendInHibatlan(true);
            }
            else
            {
                sendInHibatlan(false);
            }
        }
        else
        {
           // alert("send view");
             sendInHibatlan(false);
        }
    }

};

 var popupid3;
var popupVon;
function reviewVonalas(elem, e)
{

   // alert(elem.id);
    e.stopPropagation();

    var allYe = document.getElementsByClassName("tooltip2");
    for(var i = 0;i<allYe.length;i++)
    {
        allYe[i].style.backgroundColor = "#ffffff";
    }
    elem.style.backgroundColor = "#ffff00";
    var kids = elem.children;
    var kid1 = kids[0].id;

    var szamok = kid1.split("-");
    var sorsz2 = elem.id.split("-");
    var popupAzo = "tool2" + sorsz2[0];

    if(popupVon != null)
    {
        document.getElementById(popupVon).style.visibility = "hidden";
    }
    popupVon = "tool2" + sorsz2[0];

    /*
    if(popupid3 != null)
    {
        var kid = popupid3.children;
        kid[1].style.visibility = "hidden";
    }
    */
   // popupid3 = elem;

    var toltel = "???";

    var toltel = GLOBTEACHREMARKS[sorsz2[1]];

    if(toltel.trim() === "-")
    {
        toltel = "";
    }
    else
    {
        toltel = "<br /><span style='color: #00fe00' >" + toltel + "</span>";
    }

    var corrSolution = globObj.contents[szamok[0]].explain[szamok[1]];
    var allPopup = corrSolution + toltel;

    document.getElementById(popupAzo).innerHTML = allPopup;

   document.getElementById(popupAzo).style.maxWidth = "400px";
    document.getElementById(popupAzo).style.display = "block";
    document.getElementById(popupAzo).style.visibility = "visible";

}


function getTheFileVonal(fileCime, procFun)
{
    // GET TASK FILE
    putinLoader();
    globFeladatPath = fileCime;

    var userN = document.getElementById("inName").value.trim();
    var userP = document.getElementById("inPass").value.trim();
    var userTi = document.getElementById("tempida").value.trim();

    var  kuld = "user=" + userN + "&pw=" + userP + "&tempid=" + userTi + "&taskCime=" + fileCime + "&code=1"; // itt nincs jelentősége a code-nak


    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            offLoadeer();
            procFun(this.responseText);
           // alert(this.responseText);
        }
    };

 //
    xhttp.open("POST", "MAJAXOK/filefeed.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(kuld);
}

var globVocObj;
var globVocUserTipp;
var globTaskObj;
var globUserTipps;

var procABCgrammar = function (inpu)
{
    globTaskObj = JSON.parse(inpu);

    var title = globTaskObj.title;

    glogTaskCim = title;

    var instuc =  globTaskObj.instructions.replace(/B1/g, '<b>');
    var instuc =  instuc.replace(/B2/g, '</b>');


    var sentences = globTaskObj.contents;

    var mondatSor = "";
    var usert = [];
    globUserTipps = usert;
    for(var i = 0;i<sentences.length;i++)
    {
        globUserTipps.push("GGG_");
        var kisSor = "";
        var egyMond = sentences[i].sentence;
        for(var s = 0;s<egyMond.length;s++)
        {

            var von = " _________ ";
            if(s == egyMond.length-1)
            {
                von = "";
            }
            kisSor = kisSor + egyMond[s] + von;
        }
        var sori = i+1;
        mondatSor = mondatSor + "<tr><td style='padding-top: 12px;vertical-align: top' >" + sori + ".</td><td style='padding-top: 12px' >" +  kisSor + "</td></tr>";

        // distracor choices

        var dist = sentences[i].distractors;
        var realDist = "";
        var distSor = "";

        for(var d = 0;d<dist.length;d++)
        {

            var kisDist = dist[d];
            for(var k = 0;k<kisDist.length;k++)
            {
                var betu = String.fromCharCode(65 + k);
                realDist = realDist + "<td style='cursor: pointer' id='" + i + "_" + k + "'  onclick='mcWordClick(this);' >" +  betu + ") " + kisDist[k] + "</td>";
            }

        }
        distSor = "<tr><td></td><td><table style='width: 100%;table-layout: fixed' id='tab_" + i + "' ><tr>" + realDist + "</tr></table></td></tr>";
        mondatSor = mondatSor + distSor;

    }

    var acim = "<div  class='tabTitle' >" + title + "</div>";

    var inst = "<div  class='tabInstru'>" + instuc + "</div>";

    var cimKer = "<div class='headFrame' >" + acim + inst + "</div>";


    var lev = null;
    if(typeof globTaskObj.weight !== 'undefined')
    {
        lev = globTaskObj.weight;
    }




    var foTab = "<table class='mondatTable' style='text-align: left;margin-top: 14px' id='montab' >" + mondatSor + "</table>";

    var submDiv = submitButton("submitABC()");
    document.getElementById("workTop1").innerHTML = "<div id='coverMCgram' class='coverMCgram' style='background-color: #ffffff' >" + giveNewHwDas() + "<div style='position: relative' ><div id='submitCover' class='subCov'><div class='subCovBele' id='subCovInner' ><span id='beadText'>" + globLang.submDate + "</span><span id='nextGo' class='nextTask' onclick='ujHwNext(1)' >" + globLang.nextTasked + "</span></div></div><div style='padding-left: 36px;padding-right: 36px' >" + cimGauge(title, instuc, lev) + helperDiv(globTaskObj) + foTab + "</div></div>" + submDiv + "</div>";

    animNewHw();

};

function submitButton(submitFunc)
{
    var dik1 = "<div  style='text-align: center;background-color: #ffffff;padding-top: 24px;padding-bottom: 36px'   >";

    dik1 += "<div id='beadGombCover'  class='beadomButt' style='text-align: center;display: inline-block' onclick='" + submitFunc + ";' ><div id='beadGomb'   >" + globLang.beadom + "</div>";

    dik1 += "</div></div>";

    return dik1;
}

function mcWordClick(elem)
{
  //  alert(elem.id);
    var szamBet = elem.id.split('_');
    globUserTipps[szamBet[0]] = szamBet[1];
    var atabid = "tab_" + szamBet[0];
    var atab = document.getElementById(atabid);
    var tabRow = atab.rows;
   var tabDT = tabRow[0].cells;

    for(var i = 0;i<tabDT.length;i++)
    {
        tabDT[i].style.color = "#111111";
        tabDT[i].style.fontWeight = "normal";
    }

    elem.style.color = "#3344ff";
    elem.style.fontWeight = "bold";

}

function animacio()
{
    var agomb =  document.getElementById("beadGomb");

    agomb.addEventListener("webkitAnimationEnd", function(){animOver();});
    agomb.addEventListener("animationend", function(){animOver();});

    agomb.style.WebkitAnimation = "felhuz 0.3s 1";
    agomb.style.animation = "felhuz 0.3s 1";
}

function animOver()
{
   // elem.style.animationTimingFunction="ease-out";
   // var elemINfo = elem.getBoundingClientRect();
   // alert(elemINfo.width);
    var agomb =  document.getElementById("beadGomb");
  //  agomb.innerHTML = globLang.submDate;
   // agomb.parentElement.style.backgroundColor = "#ff0000";

    agomb.style.WebkitAnimation = "letol 0.3s 1";
    agomb.style.animation = "letol 0.3s 1";

   // document.getElementById("beadGombCover").style.backgroundColor = "#175F55"; // dark green
   // document.getElementById("beadGomb").innerHTML = globLang.beadom;

    // successful submit???
    var fullCov = document.getElementById("fullCover");
    if(fullCov.style.display === 'table')
    {
        // not successful
        agomb.innerHTML = globLang.noSub;
       // agomb.parentElement.style.backgroundColor = "#175F55";
        document.getElementById("beadGombCover").style.backgroundColor = "#175F55";

    }
    else
    {
        // SUCCESSFUL SUBMIT
        agomb.innerHTML = globLang.submDate;
        agomb.parentElement.style.backgroundColor = "#ff0000";
    }


    var newone = agomb.cloneNode(true);
    agomb.parentNode.replaceChild(newone, agomb);

   einstein();

}

function einstein() {
    var arca = document.getElementById("arc");

    var newone = arca.cloneNode(true);
    arca.parentNode.replaceChild(newone, arca);

    arca.style.animationDelay = "0";
    arca.style.animation = "einsteinArc 1s 0s";
    arca.style.WebkitAnimation = "einsteinArc 1s 0s";
}


function allFilled()
{
    if(globUserTipps.includes("GGG_") || globUserTipps.includes("GGG"))
    {
        if(confirm(globLang.notComplete))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    else
    {
        return true;
    }
}

function submitABC()
{

    var curPa = hwobj.assigned.findIndex(function(x) {if(x.id == globFeladatID){ return true }});
    if(curPa != -1)
    {


        if(allFilled())
        {

         //   hwobj.assigned[curPa].viewed = "yes";
            var osszTip = "";
            for(var i = 0;i<globUserTipps.length;i++)
            {
                osszTip = osszTip + globUserTipps[i] + "_";
            }

            document.getElementById("submitCover").style.height = "100%";
            document.getElementById("subCovInner").style.height = "40px";

            var agomb =  document.getElementById("beadGomb");
            agomb.innerHTML = globLang.loading;

            submitSoluProvide(osszTip, 2);

         //   elem.innerHTML = globLang.submDate;
         //   elem.style.backgroundColor = "#ff0000";

          //  animacio(elem);
        }


    }
    else
    {
        alert("You have already submitted this task.");
    }


}

var procVocab = function (inpu)
{
    globVocObj = JSON.parse(inpu);
    globChosenWord = "";
    //alert(globVocObj.title);
    var sentences = globVocObj.contents;
    glogTaskCim = globVocObj.title;

    var cime = globVocObj.title;
    var inst = textDeco(globVocObj.instructions);

    //alert(sentences.length);
    var tabrow = "";
    var wordArr = [];
    var userTips = [];

    for(var i = 0;i<sentences.length;i++)
    {
        var egyWord = {};
        userTips.push("GGG");
        var egysor = "";
        var vonal1;
        var vonal2;
        if(sentences[i].go2.trim() == "") // egy szavas sor
        {
            vonal1 = "<span class='beirtWord' id='von_" + i + "' > __________ </span>";
            vonal2 = "<span class='beirtWord' id='von2_" + i + "' ></span>";
            egysor = egysor + sentences[i].gel.trim() + vonal1 + sentences[i].ge2.trim() + vonal2;
            egyWord.w1 = sentences[i].go1;
            egyWord.w2 = "";
            egyWord.id = i;
            egyWord.mean = sentences[i].meaning;
            egyWord.used = false;
        }
        else
        {
            vonal1 = "<span class='beirtWord' id='von_" + i + "' >  __________ </span>";
            vonal2 = "<span class='beirtWord' id='von2_" + i + "' >  __________ </span>";
            egysor = egysor + sentences[i].gel.trim() + vonal1 + sentences[i].ge2.trim() + vonal2 + sentences[i].ge3.trim();
            egyWord.w1 = sentences[i].go1;
            egyWord.w2 = sentences[i].go2;
            egyWord.id = i;
            egyWord.mean = sentences[i].meaning;
            egyWord.used = false;
        }
        wordArr.push(egyWord);
        var sorS = i + 1;
        tabrow = tabrow + "<tr><td style='vertical-align: top' >" + sorS + ".</td><td onclick='sentenceClic(this);' id='vocsent_" + i + "' >" + egysor + "</td></tr>";
    }

    globVocUserTipp = userTips;
    globUserTipps = userTips;
    // bestsolus.sort(function(a, b){return b.total - a.total});

   // wordArr = wordArr.sort(function(a, b) {return a.w1 > b.w1});
    wordArr.sort(function( a , b ){
        return a.w1 > b.w1 ? 1 : -1;
    });
    var wordSpans = "";
    for(i = 0;i<wordArr.length;i++)
    {
        var egySpan = "<div class='words' onclick='wordClick(this);'  id='word_" + wordArr[i].id + "' >" + wordArr[i].w1 + " " + wordArr[i].w2 + "</div>";
        wordSpans = wordSpans + egySpan;
    }

    var wordDiv = "<div class='wordBackGr' >" + wordSpans + "</div><div style='background-color: #ffffff' ><span onclick='wordHelp();' style='width: 8px;height: 8px;display: inline-block;background-color: #00a100;margin-left: 24px;margin-right: 4px;cursor: pointer' ></span><span id='chWord' >" + globLang.chosWord + "</span><span id='selWord' class='word' style='color:#00a100;font-weight: bold' ></span><span id='ameaning' ></span></div>";
    var aTable = "<table class='mondatTable' style='text-align: left;margin-top: 14px' id='montab' >" + tabrow + "</table>";

    var submDiv = submitButton("submitVoc()");

    var lev = null;
    if(typeof globVocObj.weight !== 'undefined')
    {
        lev = globVocObj.weight;
    }


    document.getElementById("workTop1").innerHTML = "<div id='coverMCgram' class='coverMCgram' style='background-color: #ffffff' >" + giveNewHwDas() + "<div style='position: relative' ><div id='submitCover' class='subCov'><div class='subCovBele' id='subCovInner' ><span id='beadText'>" + globLang.submDate + "</span><span id='nextGo' class='nextTask' onclick='ujHwNext(1)' >" + globLang.nextTasked + "</span></div></div><div style='padding-left: 36px;padding-right: 36px'>" + cimGauge(cime, inst, lev) + wordDiv + aTable + "</div>" + submDiv + "</div></div>";


    animNewHw();
};


function wordSelectReset()
{
    var allWords = document.getElementsByClassName("words");
    for(var i = 0;i<allWords.length;i++)
    {
        allWords[i].style.backgroundColor = "#6688ff";
    }

}
var globChosenWord = "";

function wordHelp()
{

    if(globChosenWord != "")
    {
        document.getElementById("ameaning").innerHTML = " = " + globVocObj.contents[globChosenWord].meaning;

    }
    else
    {
        alert(globLang.notSelyet);
    }

}


function wordClick(elem)
{
  //  alert(elem.id);
    document.getElementById("ameaning").innerHTML = "";
    wordSelectReset();
    elem.style.backgroundColor = "#111111";
    var sor = elem.id.split('_');
    globChosenWord = sor[1];

    document.getElementById("selWord").innerHTML = elem.innerHTML;
}

function sentenceClic(elem)
{
    if(globChosenWord.trim() == "")
    {
     alert(globLang.notSelyet);
        return;
    }
    var sentenceSor = elem.id.split("_");
    var sorsz = sentenceSor[1];

    globUserTipps[sorsz] = globChosenWord;
    // write in the word
    var w1 =  globVocObj.contents[globChosenWord].go1;
    var w2 =  globVocObj.contents[globChosenWord].go2;
    var elozobetu = globVocObj.contents[globChosenWord].gel.trim();
    var lastC = elozobetu.charAt(elozobetu.length-1);
    if(lastC === "" || lastC === "." || lastC === "?" || lastC === "!")
    {
      //  string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
        w1 = w1.charAt(0).toUpperCase() + w1.slice(1).toLowerCase();
    }

    var id1 = "";
    var id2 = "";
    if(w2.trim() == "")
    {
        id1 = "von_" + sorsz;
        id2 = "von2_" + sorsz;
        document.getElementById(id1).innerHTML = " " + w1 + " ";
        document.getElementById(id2).innerHTML = " ";
       // alert(w1);
    }
    else
    {
        id1 = "von_" + sorsz;
        id2 = "von2_" + sorsz;
        document.getElementById(id1).innerHTML = " " + w1 + " ";
        document.getElementById(id2).innerHTML = " " + w2 + " ";

    }
    grayWords();
}

function grayWords()
{
    var allWords = document.getElementsByClassName("words");
    for(var i = 0;i<allWords.length;i++)
    {
        allWords[i].style.color = "#ffffff";
    }


    for(var k = 0;k<globUserTipps.length;k++)
    {
        if(globUserTipps[k] !== "GGG")
        {
            var azid = "word_" + globUserTipps[k];
            document.getElementById(azid).style.color = "#ababab";
        }
    }
}


function submitVoc()
{
    var curPa = hwobj.assigned.findIndex(function(x) {if(x.id == globFeladatID){ return true }});
    if(curPa != -1) {

       if(allFilled())
       {
           hwobj.assigned[curPa].viewed = "yes";

           var usTip = "";
           for(var i = 0;i<globUserTipps.length;i++)
           {
               usTip = usTip + globUserTipps[i] + "_";
           }
           document.getElementById("submitCover").style.height = "100%";
           document.getElementById("subCovInner").style.height = "40px";

           var agomb =  document.getElementById("beadGomb");
           agomb.innerHTML = globLang.loading;
           submitSoluProvide(usTip, 3)
       }
    }
    else
    {
        alert(globLang.alreadySubmitted);
    }

}
var globObj = "";
var Contents = "";

var procVonal = function (inp)
{
    // hwobj ennek kellene lennie inkább
    globObj = JSON.parse(inp);
    var sentencArr = globObj.contents;

    //alert(sentencArr.length);
    var sentences = "";
    Contents = globObj.contents;
    glogTaskCim = globObj.title;

    var instruk =  globObj.instructions.replace(/(B1)/g, "<b>");
    instruk =  instruk.replace(/(B2)/g, "</b>");


    var sor = "";
    var fullSor = "";
    var stil = "style='border-style:none;border-bottom-style:solid;border-width:1px;padding-left:4px;padding-right:4px;text-align:center;font-weight:bold;color:#5566ff'";
    for(var i = 0;i<sentencArr.length;i++)
    {
        sor = "";
        sentences = "";
        for(var s = 0;s<Contents[i].sentence.length;s++)
        {
            var vonal = "<input onfocus='towhite(this);' class='texInp' " + stil + " id='" + i + "-" + s + "' type='text'>";
            if(s == Contents[i].sentence.length-1)
            {
                vonal = "";
            }
            sentences = sentences + Contents[i].sentence[s] + vonal;
        }
        var sorszam = i+1;
        sor = "<tr><td style='vertical-align: top' >" + sorszam + ".</td><td>" + sentences + "</td></tr>";
        fullSor = fullSor + sor;
    }


    var cimSor = "<tr><td colspan=2 class='tabTitle' >" + glogTaskCim + "</td></tr>";
    var instrSor = "<tr><td colspan=2 class='tabInstru' >" + instruk + "</td></tr>";

    var lev = null;
    if(typeof globObj.weight !== 'undefined')
    {
        lev = globObj.weight;
    }

    fullSor = "<tr><td colspan='2' >" + helperDiv(globObj) + "</td></tr>" + fullSor;
    //var subSor = "<tr><td colspan='2' style='text-align: center;padding-top: 24px' ><span id='beadGomb' class='beadomButt' onclick='submitResults(this)' >" + globLang.beadom + "</span></td></tr>";
    var subSor = submitButton("submitVonalas()");
    var fullTable = "<table class='mondatTable' style='text-align: left;margin-top: 14px;padding-left: 36px;padding-right: 36px;width: 100%' id='montab' >" + cimGauge(glogTaskCim, instruk, lev) + fullSor + "</table>";

   // var pages = getPage();
   // var dashbo = "<table class='dashBoartTable'><tr> <td><span id='pages'>" + pages[0] + "/" + pages[1] + "</span></td> <td style='text-align: right' ><span id='backButt' class='dashBoardButt1' onclick='ujHwNext(-1, true)' >" + globLang.back + "</span><span id='nextButt' onclick='ujHwNext(1, true)' class='dashBoardButt2' >" + globLang.next + "</span></td> </tr></table>";


    document.getElementById("workTop1").innerHTML = "<div id='coverMCgram' class='coverMCgram' style='background-color: #ffffff' >" + giveNewHwDas() + "<div style='position: relative' ><div id='submitCover' class='subCov'><div class='subCovBele' id='subCovInner' ><span id='beadText'>" + globLang.submDate + "</span><span id='nextGo' class='nextTask' onclick='ujHwNext(1)' >" + globLang.nextTasked + "</span></div></div><div style='position: relative' >" + fullTable + "</div></div>" + subSor + "</div>";

    animNewHw();
};

function cimGauge(tit, instr, level)
{
    var gauges = ["gauge_ele.png", "gauge_pre.png", "gauge_int.png", "gauge_upp.png", "gauge_adv.png", "gauge_legend.png"];
    var levels = ["---","ELEMENTARY", "PRE-INTERMED.", "INTERMEDIATE", "UPPER-INTERM.", "ADVANCED", "LEGEND"];
    var colors = ["#59E6E1", "#5EB9E6", "#699AE6", "#6A63E6", "#AB67E6", "#C13769", "#AC2D29"];
    if(level === null)
    {
        level = 0;
    }
    else
    {
        level++;
    }
    var squares = "";
    for(var i = 0;i<level;i++)
    {
        squares += "<div class='levelsquare' style='background-color:" + colors[i] + "' ></div>";
    }


    var aret = "<tr><td colspan='2' ><table style='width: 100%' >";
  //  aret += "<tr><td class='tabTitle'>" + tit + "</td><td rowspan='2' ><img width='50px' src='IMAGES/" + gauges[level] + "' </td></tr>";
    aret += "<tr><td class='tabTitle'>" + tit + "</td><td rowspan='2' ><div style='text-align: right' >" + squares + "</div><div style='color:#3ab3e6;font-weight: bold;font-size: 12px;text-align: right' >" + levels[level] + "</div></td></tr>";
    aret += "<tr><td class='tabInstru'>" + instr + "</td></tr></table></td></tr>";
    return aret;
}

function submitVonalas()
{

    var curPa = hwobj.assigned.findIndex(function(x) {if(x.id === globFeladatID){ return true }});
    if(curPa !== -1)
    {

        hwobj.assigned[curPa].viewed = "yes";
        var allText = document.getElementsByClassName("texInp");



        var tippek = "";
        var tippArr = [];

        var toolong = false;
        for(var i = 0;i<allText.length;i++)
        {
            var texi = allText[i].value.trim();
            if(texi.length > 50) // max number of characters in the text box
            {
                allText[i].style.backgroundColor = "#ffbbbb";
                toolong = true;
            }

            var tex = allText[i].value.trim();
            tex = tex.replace(/_/g, "");

            tex = tex.replace(/;/g, "");
            if(tex == "")
            {
                tippek = tippek + "GGG_";
                tippArr.push("GGG");
            }
            else
            {
                tippek = tippek + tex + "_";
                tippArr.push(tex);
            }
        }

        if(toolong)
        {
            alert("There are too long sentences.");
            return;
        }

        var agomb =  document.getElementById("beadGomb");
        if(tippArr.includes("GGG"))
        {
          if (confirm(globLang.notComplete) == true)
          {
              document.getElementById("submitCover").style.height = "100%";
              document.getElementById("subCovInner").style.height = "40px";

              agomb.innerHTML = globLang.loading;
           //  submitSoluProvide(tippek, 1);
              submitSoluProvide(JSON.stringify(tippArr), 1); // submit array as JSON
              // animacio(elem);
          }
        }
        else {
            document.getElementById("submitCover").style.height = "100%";
            document.getElementById("subCovInner").style.height = "40px";

            agomb.innerHTML = globLang.loading;
         // submitSoluProvide(tippek, 1);
            submitSoluProvide(JSON.stringify(tippArr), 1); // submit array as JSON
           // animacio(elem);
        }

        // alert(tippek);
    //

    }
    else
    {
        alert(globLang.alreadySubmitted);
    }

}

function submitSoluProvide(tippek, typ)
{
    // EZEKET VISSZA KELL TENNI
     var tempID = document.getElementById("tempida").value.trim();
     var userNAME = document.getElementById("inName").value.trim();
     var userPASS = document.getElementById("inPass").value.trim();


    var kuld = "user=" + userNAME + "&pw=" + userPASS + "&tempid=" + tempID + "&taskID=" + globFeladatID + "&tipps=" + tippek + "&taskName=" + globFeladatPath + "&cime=" + glogTaskCim + "&code=0" + "&tip=" + typ + "&redone=" + GLOBREDO;


    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            animacio();
            updateHomework(10);
          //  alert(this.responseText);
            if(this.responseText !== "0" + "")
            {
                if(this.responseText === "1" + "")
                {
                    //toLogOut(globLang.errNotSubmitted);
                    logInAgain();
                }
                else
                {
                    alert(this.responseText);
                }
            }
        }
    };

    xhttp.open("POST", "TEACHER/ajaxSubmitHW.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(kuld);


}

function logInAgain() {

    popUpFill();
    document.getElementById("sessOver").innerHTML = globLang.sessover;
    document.getElementById("fullCover").style.display = "table";
    document.getElementById("submitCover").style.backgroundColor = "#ff000033";
    document.getElementById("beadText").innerHTML = globLang.noSub; // not submitted
    document.getElementById("nextGo").innerHTML = "";



}

var helpsor = [];
var posi = 0;
function backHelp()
{
    if(helpsor.length > 1)
    {
        if(posi < helpsor.length -1)
        {

            posi++;
           // alert(helpsor[posi] + " a posi: " + posi);
            loadHelper(helpsor[posi], 2);
        }
        else
        {
            alert("nem lehet visszamenni");
        }
    }
    else
    {
        alert("nem lehet visszamenni");
    }
}

function nextHelp()
{
    if(posi > 0)
    {
        posi--;
        loadHelper(helpsor[posi], 1);
    }
    else
    {
        alert("még nincs előre");
    }
}

function loadHelper(afn, source)
{

    var kuld = "fn=" + afn;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            fillHelp(this.responseText, afn, source);

        }
    };

    xhttp.open("POST", "MAJAXOK/ajaxSendHelp.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(kuld);
}


function fillHelp(tartalom, afn, source)
{
    if(source === 0) // not back or next butt, but original button, so put it in the stack
    {

        if(helpsor.length > 0)
        {

            if(helpsor.includes(afn)) // already been to this page, brink it to the first place?
            {
                var azind = helpsor.findIndex(function(x) {if(x == afn){ return true }}); // get index of prev elem
                posi = azind;
                /*
                if(helpsor.length>1)
                {

                    var kiszed = helpsor[azind]; // take out that element
                    // put the removed element to the first place
                  //  alert("kiszed előtt: " + helpsor.length + " amit kiszed: " + kiszed);
                    if(posi != 0)
                    {
                       // a posi előtti részt kiszedni megfordítani és visszatenni
                        var toRev = [];
                        if(posi >= azind)
                        {
                            // kiszedni azind - 1 -től
                            toRev = helpsor.slice(azind);
                            alert(toRev + " a hoss");
                        }
                        else
                        {
                            // kiszedni és fordítani a posiig bezárólag
                            toRev = helpsor.slice(0, posi+1);
                            toRev.reverse();
                            alert("ford " + toRev.length);
                            for(var i = 0;i<toRev.length;i++)
                            {
                                helpsor[i] = toRev[i];
                            }
                        }


                    }

                    helpsor.splice(azind, 1);
                    helpsor.splice(0, 0, afn); // add new element at posi 0;



                }
                */
            }
            else
            {
                // if new page, just put it to the front of the stack
                helpsor.splice(0, 0, afn); // add new element at posi 0;
              //  alert("ez még nincs benne " + helpsor);

            }

        }
        else
        {
           // alert("hossz: " + helpsor.length);
            // the new file is not yet in the array
            if(posi > 0)
            {
                helpsor.splice(0, posi); // delete the elements before curr posi
                posi = 0;
            }
            helpsor.splice(0, 0, afn); // add new element at posi 0;
        }


    }





    if(tartalom != "nofile")
    {
        tartalom = tartalom.replace(/<doboz>/g, doboz());
        tartalom = tartalom.replace(/<\/doboz>/g, "</div></div>");

        var helpCont = document.getElementById("helpContentDiv");
        if(helpCont != null)
        {
            // nem kell slide-olni, csak kitölteni
            document.getElementById("helpContentDiv").innerHTML = tartalom;
        }
        else
        {
            // slide the div to the side and fill
            var keretDiv = "<div style='background-color: #dce3d9;vertical-align: top;padding-bottom: 24px'><div style='text-align: right;background-color: #dadbd3;padding-top: 2px;padding-bottom: 2px' ><span class='leftArrow' style='float: left' onclick='backHelp();' ></span><span class='rightArrow' style='float: left' onclick='nextHelp()' ></span><span id='closeHelp' class='closeX' onclick='slideBack()' >x</span></div><div id='innerFrame' style='height: 500px;overflow-y: auto' ><div id='helpContentDiv'>" + tartalom + "</div></div><div>";
            slideLeft(keretDiv);
        }

    }
    else
    {
        alert("Unfortunately, there is no helper file for this topic: " + afn);
    }


}

function doboz()
{
    var dd1 = "<div class='dobozKeret'>";

    dd1 += "<div class='dobozFejlec' ><span class='closeX' onclick='openit(this)' >V</span></div>";

    dd1 += "<div class='dobozTartalom' >";

    return dd1;
}

function openit(elem)
{
    var apa = elem.parentElement.parentElement.children;
    apa[1].classList.toggle("dobozTartalom");
    apa[1].classList.toggle("dobozTartalomOpen");

}



function slideLeft(helpTart)
{
    var acover = document.getElementById("coverMCgram");



    if(acover != null)
    {

        var taskCont = document.getElementById("workTop1");
        var helpTD = document.getElementById("helpContent");


        taskCont.classList.toggle("taskContentNormal");
        taskCont.classList.toggle("taskcontentLeft");

        helpTD.classList.toggle("helpContentNormal");
        helpTD.classList.toggle("helpContentLeft");

       //helpTD.innerHTML = helpTart;

        setTimeout(function(){ helpTD.innerHTML = helpTart; }, 300);

    }
}

function slideBack()
{
    var taskCont = document.getElementById("workTop1");
    var helpTD = document.getElementById("helpContent");

    helpTD.innerHTML = "";

    taskCont.classList.toggle("taskContentNormal");
    taskCont.classList.toggle("taskcontentLeft");

    helpTD.classList.toggle("helpContentNormal");
    helpTD.classList.toggle("helpContentLeft");
}

function regi(po)
{
    var regi = document.getElementById("regiTab");
    var elfi = document.getElementById("elfTab");

    if(po == 0)
    {
        elfi.style.display = "none";
        if(regi.style.display == "none")
        {
            regi.style.display = "block";
        }
        else
        {
            regi.style.display = "none";
        }

    }
    else
    {
        regi.style.display = "none";
        if(elfi.style.display == "none")
        {
            elfi.style.display = "block";
        }
        else
        {
            elfi.style.display = "none";
        }

    }

}
function offLoadeer()
{
  document.getElementById("loaderDiv").style.visibility = "hidden";
}
function putinLoader()
{
  //alert("put in loader");
  //var bele = "<div style='padding:36px;background-color:#ffffff;max-width:700px;margin-left:auto;margin-right:auto;text-align:center'  > <img src='IMAGES/loader.gif'> </div>";
// document.getElementById("workTop1").innerHTML = bele;
  document.getElementById("loaderDiv").style.visibility = "visible";
}

function sendMeMail() {

    document.getElementById("uziMail").innerHTML = "Küldés...";
    var resul = grecaptcha.getResponse(widgetId1);
    var userMailAdd = document.getElementById("userEmail").value.trim();
    var msContent = document.getElementById("messContent").value.trim();
    if(userMailAdd === "")
    {
        alert("Nem töltötte ki az e-mail címét.");
        return;
    }
    if(msContent === "")
    {
        alert("Nem írt üzenetet.");
        return;
    }



    var filename = "TEACHER/ajaxSendMeMail.php";
    var kuldi = "mailadd=" + userMailAdd + "&msCont=" + msContent + "&resu=" + resul;

    updateHW(filename, kuldi).then(function (res) {

        document.getElementById("uziMail").innerHTML = res;
    });


}

function openContact() {

    var contTab = document.getElementById("mailTab");
    if(contTab.style.display === "table")
    {
        contTab.style.display = "none";
    }
    else
    {
        contTab.style.display = "table";
    }
}

var widgetId1;

var onloadCallback2 = function() {
    // Renders the HTML element with id 'example1' as a reCAPTCHA widget.
    // The id of the reCAPTCHA widget is assigned to 'widgetId1'.
    widgetId1 = grecaptcha.render('acap', {
        'sitekey' : '6LfIFFwUAAAAACgkVoqgpi4PglapcTc9uCNsSu7V',
        'theme' : 'light'
    });
};

function resetCap() {
    widgetId1 = grecaptcha.reset();
}