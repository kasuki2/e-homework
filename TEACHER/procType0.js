function type0(inp, hwfile) {

    var userSol = hwfile.userTipps.split("_");
    popupVon = null;
    var minden = "";
    var bele = "";


    chekObj = JSON.parse(inp);

    var contents = chekObj.contents;
    var von = 0;
    var corrSolu = 0;
    var incorrect = 0;
    var notProvided = 0;

    for (var i = 0; i < contents.length; i++) {

        var sentence = contents[i].sentence;
        var sor = "";
        var distract1 = [];
        distract1 = contents[i].distractors;

        var remarks = [];
        remarks = contents[i].remarks;

        var corSolu = [];
        corSolu = contents[i].solu;

        var corr = "";

        var kulsoSols = "";
        var bestsolus = [];
        for (var k = 0; k < sentence.length; k++) {
            var sols = "";
            if (k == 0) {
                for (var v = von; v < von + sentence.length - 1; v++) {
                    sols = sols + userSol[v] + "-";
                }
                kulsoSols = sols;
                var mindi = "";
                for (var q = 0; q < corSolu.length; q++) {
                    if (q == 0) {
                        var sepi = "";
                    }
                    else {
                        sepi = "-";
                    }
                    mindi = mindi + sepi + corSolu[q];
                }
                //  alert(kulsoSols + " ::: " + corSolu);
                //

                var totcor = 0;
                for (var c = 0; c < corSolu.length; c++) {
                    var corrects = "";
                    var ajo = corSolu[c].split('-');
                    var kuls = kulsoSols.split('-');
                    var ok = false;
                    for (var w = 0; w < ajo.length; w++) {
                        if (ajo[w].includes('a')) {
                            for (var u = 0; u < ajo.length; u++) {
                                if (ajo[u].includes('a') && ajo[u].includes(kuls[u]) === false) {
                                    ok = false;
                                    break;
                                }
                                else {
                                    ok = true;
                                }
                            }

                            if (ok) {
                                corrects = corrects + "1";
                                totcor++;
                            }
                            else {
                                corrects = corrects + "0";
                            }
                        }
                        else {
                            if (ajo[w].includes(kuls[w])) {
                                corrects = corrects + "1";
                                totcor++;
                            }
                            else {
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

                bestsolus.sort(function (a, b) {
                    return b.total - a.total
                });
            }


            var jok = bestsolus[0].sol.split("");
            var astyle = "";

            if (k < sentence.length - 1) {
                var inn = "";

                var dist = [];
                var remi = [];
                var allDist = "";
                for (var d = 0; d < distract1[k].length; d++) {
                    dist = distract1[k];
                    remi = remarks[k];
                    allDist += dist[d] + " ";


                }



                var ajoSol = false;
                if (jok[k] == "1") {
                    astyle = "style='color:#008800'"; // correct solution
                    inn = "correct solution";
                    inn = allDist;
                    corrSolu++;

                }
                else {
                    astyle = "style='color:#ff0000'"; // incorrect solution
                    inn = "<span class='word' id='" + i + "w" + k + "w" + "'  >" + remi[userSol[von]] + "</span>";
                    incorrect++;

                }

                if (userSol[von].trim() === "GGG") {
                    inn = "<span class='word' id='" + i + "w" + k + "w" + "' onclick='checkerVonalClick(this, event)' >" + globLang.noanswer + "</span>";
                    notProvided++;
                }

            }

            var vonalRa = "??";

            if (userSol[von].trim() != "GGG") {
                vonalRa = dist[userSol[von]]; // de még nem tudjuk, hogy ez jó-e
            }
            else {
                vonalRa = "__________";
            }

            var vonal = "<div class='tooltip2' id='" + i + "-" + k + "' onclick='checkerVonalClick(this, event);' >";
            vonal += "<span class='vona' " + astyle + " >" + vonalRa + "</span>";
            vonal += "<span  id='s" + i + k + "' class='checkeTipText'>" + inn + "</span>";
            vonal += "</div>";

            if (k == sentence.length - 1) {
                vonal = " ";
            }
            else {
                von++;
            }

            sor = sor + sentence[k] + vonal;

        }

        var sorszam = parseInt(i + 1);
        bele += "<tr><td colspan='2' ><div class='sorexp' style='height: 0'><div class='vonalasExp' id='tool2" + i + "' ></div></div></td></tr>";
        bele += "<tr><td class='sorsz' >" + sorszam + ".</td><td>" + sor + "</td></td>";

    }

    var instuc =  chekObj.instructions.replace(/B1/g, '<b>');
    instuc =  instuc.replace(/B2/g, '</b>');

    var atit = "<div class='taskInstFrame'><div class='tabTitle' >" + chekObj.title + "</div><div class='tabInstru' >" + instuc + "</div></div>";

    var oss = corrSolu + incorrect;



    var messSor = "<tr><td colspan='2' class='techerMessage'>" + "teacher message" + "</td></tr>";

    var eredMenyTab = "<tr><td colspan='2' style='padding-top: 12px;text-align: right' ><span class='resultInfo' >Correct: "+ corrSolu +" / "+ oss +"</span> | <span class='resultInfoIncorr'> Incorrect: "+ incorrect + "</span> of which not answered: " + notProvided + "</td></tr>";

    var eredDiv = "<div class='kisParal' ><span class='resultInfo' >Correct: "+ corrSolu +" / "+ oss +"</span> | <span class='resultInfoIncorr'> Incorrect: "+ incorrect + "</span> of which not answered: " + notProvided + "</div>";
    minden = "<table class='mondTabPCorrected' >" + bele + messSor +"</table>" + eredDiv;


    var cimsor = "<div style='font-weight: bold;color: #1a6cfb' >" + hwfile.atitle + "</div>";
    cimsor += "<div style='font-style: italic'>" + chekObj.instructions + "</div>";

    document.getElementById("userResult").innerHTML = cimsor;

    document.getElementById("taskResult").innerHTML =  "<div class='keretDiv2' style='padding-bottom: 24px' >" +  minden + "</div>";
}


function checkerVonalClick(el, e)
{
    e.stopPropagation();
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
}


var GLOBTEACHREMARKS;
var globObj;
var type1 = function (muster, hwfile)
{

    popupVon = null;
    var userTipArr =  hwfile.userTipps.split("_");
    var tanarJav = hwfile.correct.split('_');
    var TRemarks = hwfile.remarks.split('_');
    GLOBTEACHREMARKS = TRemarks;
    var corrNum = 0;
    var incorNum = 0;
    var notFilled = 0;

    for(var k = 0;k<tanarJav.length-1;k++)
    {
        if(tanarJav[k] === "OK")
        {
            corrNum++;
        }
        else
        {
            incorNum++;
        }

    }

    if(muster.charAt(0) === "1")
    {
        alert("ERROR: different id. Log out and then log in again.");
        return;
    }
    globObj = JSON.parse(muster);



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
                    beir = "<i>" + " no answer " + "</i>";

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




    var fullTable = "<table class='taskTable' cellpadding='0' cellspacing='0' style='margin-bottom: 16px' >" + fullSor + "</table>";



    var eredDiv = "<div class='kisParal' ><span class='resultInfo' >Correct: "+ corrNum +" / "+ oss +"</span> | <span class='resultInfoIncorr'> Incorrect: "+ incorNum + "</span> of which not answered: " + notFilled + "</div>";


    var instuc =  globObj.instructions.replace(/B1/g, '<b>');
    instuc =  instuc.replace(/B2/g, '</b>');

    var cimsor = "<div style='font-weight: bold;color: #1a6cfb' >" + hwfile.atitle + "</div>";
    cimsor += "<div style='font-style: italic'>" + instuc + "</div>";

    document.getElementById("userResult").innerHTML = cimsor;

    document.getElementById("taskResult").innerHTML =  "<div class='keretDiv2' style='padding-bottom: 24px' >" +  fullTable + eredDiv + "</div>";


};


function type3(taskFile, hwfile) {

    popupVon = null;

    globObj = JSON.parse(taskFile);
    GLOBTEACHREMARKS = hwfile.remarks.split('_');



    var tanarJav = hwfile.correct.split('_');
    var TRemarks = hwfile.remarks.split('_');



    var sentences = globObj.contents;
    glogTaskCim = globObj.title;
    var cime = globObj.title;
    var instr = globObj.instructions;

    var tabrow = "";
    var userTips = hwfile.userTipps.split("_");
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
            mm = "no meaning";
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

   // var dashbo2 =  giveOldHwDas();
    var oss = corrSolu + incorrect;
    var inst = "<div class='taskInstFrame'><div class='tabTitle' >" + cime +  "</div><div class='tabInstru' >" + instr + "</div><div>" + wordSpans + "</div><div><div style='width: 8px;height: 8px;background-color: #00ba00;display: inline-block;margin-right: 8px' ></div><span id='theMeaning'></span></div></div>";

    var eredDiv = "<div class='kisParal' ><span class='resultInfo' >Correct: " + corrSolu +" / "+ oss +"</span> | <span class='resultInfoIncorr'> Incorrect: "+ incorrect + "</span> of which not answered: " + notProvided + "</div>";
   // var teachMessDiv = "<div class='techerMessage' style='margin-left:36px' >" + "teacher's message" + "</div>";
   // document.getElementById("workTop1").innerHTML = "<div class='parallaxOuterDiv' >" + dashbo2 + inst + "<div class='parallaxDiv' ><table style='width: 100%;background-color: #ffffff;padding-left: 36px;padding-right: 36px;padding-top: 20px;padding-bottom: 12px' >" + tabrow + "</table>" + eredDiv + teachMessDiv + giveTRem() + "</div></div>";
   // ame = document.getElementById("theMeaning");



    var instuc =  globObj.instructions.replace(/B1/g, '<b>');
    instuc =  instuc.replace(/B2/g, '</b>');

    var cimsor = "<div style='font-weight: bold;color: #1a6cfb' >" + hwfile.atitle + "</div>";
    cimsor += "<div style='font-style: italic'>" + instuc + "</div>";

    document.getElementById("userResult").innerHTML = cimsor;

    document.getElementById("taskResult").innerHTML =  "<div class='keretDiv2' style='padding-bottom: 24px' >" +  tabrow + eredDiv + "</div>";


}

function type6(taskFile, hwfile) {



    var tanarJav = hwfile.correct.split('_');
    var TRemarks = hwfile.remarks.split('_');


    GLOBTEACHREMARKS = TRemarks;

    popupVon = null;

    var uTipps = hwfile.userTipps.split("_");
    var corrNum = 0;
    var incorNum = 0;
    var notFilled = 0;


    globObj = JSON.parse(taskFile);

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
            vonal = "<textarea readonly  onclick='gram6expla(" + i + ", event);' style='width:100%;resize: none;font-weight: bold;color:#444444'>" + "no answer" + "</textarea>";
        }

        longS +=  "<tr><td colspan='2' ><div class='sorexp' ><div class='vonalasExp'  id='tool2" + i + "'></div></div></td></tr>";
        longS += "<tr style='vertical-align: top' ><td style='width: 6px' >" + remarkStyle + "</td><td>" + vonal + "</td></tr>";
    }

    var eredDiv = "<div class='kisParal' ><span class='resultInfo' >Correct: "+ corrNum +" / "+ contents.length +"</span> | <span class='resultInfoIncorr'> Incorrect: "+ incorNum + "</span> of which not answered: " + notFilled + "</div>";

    var textbele = "<table style='width: 100%;padding-left: 36px;padding-right: 36px;margin-top: 24px;margin-bottom: 24px' >" + longS + "</table>";
    var inst = "<div class='taskInstFrame'><div class='tabInstru'>" + instru + "</div><div class='tabTitle' >" + cime + "</div></div>";
    var teachMessDiv = "<div class='techerMessage' style='margin-left:36px' >" + "teacher's message" + "</div>";


    var instuc =  globObj.instructions.replace(/B1/g, '<b>');
    instuc =  instuc.replace(/B2/g, '</b>');

    var cimsor = "<div style='font-weight: bold;color: #1a6cfb' >" + hwfile.atitle + "</div>";
    cimsor += "<div style='font-style: italic'>" + instuc + "</div>";

    document.getElementById("userResult").innerHTML = cimsor;

    document.getElementById("taskResult").innerHTML = "<div class='parallaxOuterDiv'><div class='parallaxDiv'>" + textbele + eredDiv + teachMessDiv + "</div></div>";



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

}


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