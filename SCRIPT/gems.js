
/**
 * Created by telaw on 2018. 03. 01..
 */

function getVocGem()
{
  putinLoader();
    var filename = "VOCGEMS/gemfeeder.php";
    var kuld = "fileNev=vocab_be_used_to.html";

    getTheFile(filename, kuld).then(function (res) {
        vocabGem(res);
    });

}


function vocabGem(inpu)
{
    var fodiv = "<div style='max-width: 700px;background-color: #ffffff;margin-left: auto;margin-right: auto;padding-top: 36px;padding-bottom: 36px' ><div style='margin-left: 36px;margin-right: 36px' >" + inpu + "</div></div>";
    document.getElementById("workTop1").innerHTML = fodiv;
    offLoadeer();
}


function getTheFile(filename, kuld)
{
    return new Promise(function (resolve, reject){

        // var aUserNeve = document.getElementById("inName").value.trim();
        // var passWor = document.getElementById("inPass").value.trim();
        //  var kuld = "user=" + aUserNeve + "&pw=" + passWor + "&code=1" + "&num=" + 10; // code 1 get howmework

        // filename = "ajaxHwSend.php";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                resolve(this.responseText);
                //  hwobj = JSON.parse(this.responseText);

                // ez jön a then-be  fillHomework();


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
