function type0(inp, userTipps) {

    var userSol = userTipps.split("_");
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
                for (var d = 0; d < distract1[k].length; d++) {
                    dist = distract1[k];
                    remi = remarks[k];
                }


                var ajoSol = false;
                if (jok[k] == "1") {
                    astyle = "style='color:#008800'"; // correct solution
                    inn = "correct solution";
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


    document.getElementById("taskResult").innerHTML =  "<div class='keretDiv'>" +  minden + "</div>";
}