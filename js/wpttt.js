<!--
/* metodo 1
var scr=document.getElementsByTagName('script');
var src=scr[scr.length-1].getAttribute("src");
*/
/* metodo 2
var scripts = document.getElementsByTagName('script');
var thisScript = scripts[scripts.length-1];
var path = thisScript.src.replace(/\/wpttt\.js$/, '/'); 
*/
var scripts = document.getElementsByTagName('SCRIPT');
var cstris_scriptpath = '';
if(scripts && scripts.length>0) {
    for(var i in scripts) {
        if(scripts[i].src && scripts[i].src.match(/wpttt\.js([?]+)/)) {
            cstris_scriptpath = scripts[i].src.replace(/(.*)wpttt\.js[?]+(.*)/, '$1');
        }
    }
}

var Curlevel = ['Beginner', 'Learner', 'Pro', 'Geek'];

var image1=new Image(); image1.src=cstris_scriptpath+"../images/X.png";
var image2=new Image(); image2.src=cstris_scriptpath+"../images/O.png";

var level=0, myway, mynextmove;
var tmp, done, iswon;
var pcwins=0, playerwins=0, draws=0, content;
var playerstarts=true;
var moves=new Array();
var game=new Array(9);
var choices=[11,12,13,21,22,23,31,32,33];
var corners=[11,13,31,33];
var ways=new Array();
ways[1]=[0,11,12,13];
ways[2]=[0,21,22,23];
ways[3]=[0,31,32,33];
ways[4]=[0,11,21,31];
ways[5]=[0,12,22,32];
ways[6]=[0,13,23,33];
ways[7]=[0,11,22,33];
ways[8]=[0,13,22,31]; 
var w3c=(document.getElementById)?true:false;
var ns4=(document.layers)?true:false;
var ie4=(document.all && !w3c)?true:false;
var ie5=(document.all && w3c)?true:false;
var ns6=(w3c && navigator.appName.indexOf("Netscape")>=0)?true:false;

function init(){
oktoplay=true;
iswon=false;
done=0;
writetext(4);
moves[11]=0; moves[12]=0; moves[13]=0; moves[21]=0; moves[22]=0; moves[23]=0; moves[31]=0; moves[32]=0; moves[33]=0;

for(i=0;i<=8;i++){
document.images['rc'+choices[i]].src=cstris_scriptpath+"../images/blank.gif";
document.images['rc'+choices[i]].alt="";
game[i]=0;
}
WPTTT_closex()
if(!playerstarts)pcturn();
}

function writetext(num){
switch(num){
case 1: content='Draw, Well Done!';
		WPTTT_popup(content);
break;
case 2: content='Oops, You Lose!';
		WPTTT_popup(content);
break;
case 3: content='Congratulations! You Won.';
		WPTTT_popup(content);
break;
case 4: content='Current Level: '+Curlevel[level]+'\nCOMPUTER: '+pcwins+'\nYOU: '+playerwins+'\nTIES: '+draws+'\n';
break;
}

document.WPTTT_scores.scores2.value=content

if(num<4)setTimeout('init(4)',2000);
}

function setlevel(x){
	if (level!=x){
		level=x;
		init();
}}

function setbutton(cellnum){
if(moves[cellnum]==0){
document.images['rc'+cellnum].src=cstris_scriptpath+"../images/X.png";
document.images['rc'+cellnum].alt=" X ";
moves[cellnum]=1;
game[done]=cellnum;
done++;
findwinner(true);
}else alert('The game cannot start now, try agin or add in another location.');
}

function pcstrategy(istowin){
if (level>0){
var str=(istowin)? 2 : 1;
for(n=1;n<=8;n++){
if((moves[ways[n][1]]==str) && (moves[ways[n][2]]==str) && (moves[ways[n][3]]==0)) tmp=ways[n][3];
if((moves[ways[n][1]]==str) && (moves[ways[n][3]]==str) && (moves[ways[n][2]]==0)) tmp=ways[n][2];
if((moves[ways[n][2]]==str) && (moves[ways[n][3]]==str) && (moves[ways[n][1]]==0)) tmp=ways[n][1];
}}}

function selecCorner(which){
if (which=="empty"){
do{
tmp=corners[Math.floor(Math.random()*4)];
}while(moves[tmp]!=0);
}
else
tmp=corners[Math.floor(Math.random()*4)];
}

function pcdontlose(){
if (!playerstarts){
if (done==0){
tmp=choices[2*Math.floor(Math.random()*5)];
if (tmp==22) myway=1;
else myway=2;
}
else if (done==2){
if (myway==1){
if (game[1]==11 || game[1]==13 || game[1]==31 || game[1]==33)
tmp=44-game[1];	
else{
dlta=22-game[1];
op0=22+dlta+(10/dlta);
op1=22+dlta-(10/dlta);
tmp=eval("op"+Math.floor(Math.random()*2));
}}
else if (myway==2){
if (game[1]==22){
tmp=44-game[0];
myway=21;
}
else if (game[1]==11 || game[1]==13 || game[1]==31 || game[1]==33){
selecCorner("empty");
myway=22;
}
else{
tmp=22;
myway=23;
}}}
else if (done==4){
if (myway==22){
for (i==0; i<4 ;i++){
if (moves[corners[i]]==0){
tmp=corners[i];
}}}
else if (myway==23){
dlta=game[1]-game[0];
op0=44-(game[1]+dlta);
op1=(op0+game[0])/2;
tmp=eval("op"+Math.floor(Math.random()*2));
}
else if (myway==1)
tmp=44+game[2]-(2*game[3]);
}}
else if (level==3){
if (done==1){
if (game[0]==11 || game[0]==13 || game[0]==31 || game[0]==33){
tmp=22;
myway=1;
}
else if (game[0]==22){
selecCorner("any");
myway=2;
}
else{
tmp=22;
myway=3;
}}
else if (done==3){
if (myway==1){
if (game[2]==44-game[0])
tmp=choices[1+(2*Math.floor(Math.random()*4))];
else
tmp=44-game[0]
}
else if (myway==2){
if (game[2]==44-game[1])
selecCorner("empty");
}
else if (myway==3){
if (game[2]==11 || game[2]==13 || game[2]==31 || game[2]==33)
tmp=44-game[2];
if (game[2]==44-game[0]){
dlta=22-game[2];
tmp=22+(10/dlta);
mynextmove=tmp+dlta;
}
else{
dlta=22-game[0];
op0=game[0]+(10/dlta);	
op1=game[0]-(10/dlta);	
op2=game[2]+dlta;	
tmp=eval("op"+Math.floor(Math.random()*3));
}}}
else if (done==5 && myway==3){
tmp=mynextmove;
}}}

function findwinner(isplayer){
me=(isplayer)? 1 : 2;
for(n=1;n<=8;n++){
if( (moves[ways[n][1]]==me) && (moves[ways[n][2]]==me) && (moves[ways[n][3]]==me) ){
iswon=true;
break;
}}
if(iswon){
if(isplayer){
playerwins++;
playerstarts=true;
writetext(3);
}else{
pcwins++;
playerstarts=false;
writetext(2);
}}else{
if(done>8){
draws++;
playerstarts=!playerstarts;
writetext(1);
}else if(isplayer) pcturn();
}}

function pcrandom(){
do{
tmp=choices[Math.floor(Math.random()*9)];
}while(moves[tmp]!=0);
}

function pcturn(){
tmp='00';
pcstrategy(true);
if(tmp=='00')pcstrategy(false);
if(tmp=='00' && level>1)
	pcdontlose();
if(tmp=='00')
	pcrandom();
moves[tmp]=2;
game[done]=tmp;
document.images['rc'+tmp].src=cstris_scriptpath+"../images/O.png";
document.images['rc'+tmp].alt=" O ";
done++;
findwinner(false);
}

function WPTTT_popup(msg) {
	document.getElementById("WPTTT_result").innerHTML = msg;

	obj = document.getElementById("WPTTT_popup");

	var w = 160;	// set this to 1/2 the width of the PopUpFad div defined in the style sheet 
					// there's not a reliable way to retrieve an element's width via javascript!!
					
	var l = (document.body.innerWidth)? document.body.innerWidth / 2:document.body.offsetWidth / 2;
	var h = (document.body.innerHeight)? document.body.innerHeight / 2:document.body.offsetHeight / 2;

	obj.style.left = (l - w)+"px";
	obj.style.top = (document.body.scrollHeight-2*window.innerHeight/3)+"px";

	obj.style.display = "inline";
	//obj.style.visibility = "visible";
}

function WPTTT_closex() {
	document.getElementById('WPTTT_popup').style.display = "none";
	//document.getElementById('WPTTT_popup').style.visibility = "hidden";
}

window.onload=init;

window.onresize=function(){
  if(ns4)setTimeout('history.go(0)',400);
}

//-->