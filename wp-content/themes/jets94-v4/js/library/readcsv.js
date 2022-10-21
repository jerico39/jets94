

/* */
var readcsv = function (CsvName,ClassName) { //�R���X�g���N�^


var xmlhttp = false;
if(window.XMLHttpRequest) {
    // Firefox, Opera �Ȃ�
    xmlhttp = new XMLHttpRequest();
    xmlhttp.overrideMimeType('text/plain; charset=shift_jis');
} else if(window.ActiveXObject) {
    // IE
    try {
        xmlhttp = new ActiveXObject('Msxml2.XMLHTTP');
    } catch (e) {
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
}


// var xmlhttp = new XMLHttpRequest();
// xmlhttp.overrideMimeType('text/plain; charset=shift_jis');


  this.ResponseCSV = function () {

      xmlhttp.onreadystatechange = checkReadyState; //���M���A�X�e�[�^�X�ω����������ꍇ���s
    xmlhttp.open("GET",CsvName,true);
     xmlhttp.send(); //���M

	}// end ResponseCSV

    function checkReadyState(){
    if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){ //�񓯂����擾���������s
     //alert(xmlhttp.responseText);
             //����
        html = xmlhttp.responseText.split("\n");
        for(var i in html){
                  //var tmp;
                  //tmp = html[i].trim();
                  if(html[i].trim() != ""){

                  var setvar = "<tr>";
                   sp_i =html[i].split("\",\"");
               for(var j in sp_i){
                          setvar = setvar + "<td class='clm"+ j +"'>" + sp_i[j].replace("\"","");
 + "</td>";
               }
                  setvar = setvar = setvar + "</tr>"
                  jQuery(ClassName).append(setvar);   
                  }
         }//for
          jQuery('input#id_search').quicksearch(ClassName + ' tr'); //quicksearch.js
     }
   } //checkReadyState

} //end class
