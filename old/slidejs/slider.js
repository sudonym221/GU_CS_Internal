function zxcSS(o){
 var parent=document.getElementById(o.ID)                // the parent node of the images
 var imgs=parent.getElementsByTagName('IMG');            // the images in the parent node, the parent must be position 'relative' in the CSS
 this.ary=[];                                            // create a script instance array to store fade animator instances
 for (var z0=0;z0<imgs.length;z0++){                     // rotate through the images
  imgs[z0].style.position='absolute';                    // to allow the images to be placed on top of each other
  imgs[z0].style.zIndex=z0>0?'0':'1';                    // the first image is on top
  imgs[z0].style.left='0px';                             // all images have a position left of 0px
  imgs[z0].style.top='0px';                              // all images have a position top of 0px
  this.ary[z0]=new zxcFadeAnimator(imgs[z0],z0>0?0:100); // each field of this.ary contains a new instance for the fade animator with an image as its object
  this.ary[z0].opacity(z0>0?0:100);                      // set the opacity of the top image to 100 and the balance to 0
 }
 this.cnt=0;                                             // create a script instance counter this.cnt to 0
 this.lst=this.ary[0];                                   // create a script instance object referencing the top image
 this.ms=o.Duration||5000;                               // create a script instance recording the fade duration
 this.hold=o.Hold||this.ms*2;                            // create a script instance recording the automatic image change duration
}

zxcSS.prototype={

// the instance 'Next' function
// pass 1 or -1 to increment or decrement the intance count
 Next:function(ud){
  this.lst.obj.style.zIndex='0';               // move the last image to the bottom
  this.lst.fade(this.lst.data[0],0,this.ms);   // fade out the last image
  this.cnt+=ud;                                // increment or decrement the intance count
  this.cnt=this.cnt<0?this.ary.length-1:this.cnt>=this.ary.length?0:this.cnt; // if the count is less than 0 set it to the maximum, if grater then the maximum set it to 0
  this.lst=this.ary[this.cnt];                 // change the instance lst to the new image
  this.lst.obj.style.zIndex='1';               // move the last image to the top
  this.lst.fade(this.lst.data[0],100,this.ms); // fade in the last image
 },

// the instance 'Auto' function
// to automatically change the images
 Auto:function(){
  clearTimeout(this.to); // clear the timeout of the instance 'Auto' function
  var oop=this;          // assign the instance to a local vaiable  to allow the setTimeout to function
  this.Next(1);          // call the instance 'Next' function  passing 1 to increment the count
  this.to=setTimeout(function(){ oop.Auto(); },this.hold+this.ms); // recall 'Auto' after the 'hold' plus 'fade' duration
 },

}
// Opacity Fade Animator
function zxcFadeAnimator(obj,srt){
 this.obj=obj;            // the instance object
 this.data=[srt];         // and array the current, start and finish value of opacity
 this.to=null;
}

zxcFadeAnimator.prototype={

// instace function 'fade'
// to start a fade in or fade out
// parameter 0 = the fade start value.  (digits)
// parameter 1 = the fade finish value. (digits)
// parameter 0 = the fade duration.     (digits)
 fade:function(srt,fin,ms){
  clearTimeout(this.to);         // stop the instance setTimeout
  this.data=[srt,srt,fin];       // assign the current, start and finish value of opacity
  this.ms=ms*1;                  // the duration of the effect
  this.srt=new Date().getTime(); // the start time of the change
  this.change();                 // start the change
 },

// instance function 'change'
// to control the change of fade in or fade out
 change:function(){
  var oop=this;                                                      // assign the instance to a local vaiable  to allow the setTimeout to function
  var ms=new Date().getTime()-this.srt;                              // the current time minus the start time
  this.data[0]=(this.data[2]-this.data[1])/this.ms*ms+this.data[1];  // increment the current value dependent on the start and finish values and elapsed time
  this.opacity(this.data[0]);                                        // set the opacity to the current value
  if (ms<this.ms){                                                   // if the elapsed time is less than the 'fade duration' recall function opac
   this.to=setTimeout(function(){oop.change()},10);
  }
  else {
   this.data[0]=this.data[2];                                        // set the current value to the finish value
   this.opacity(this.data[0]);                                       // set the opacity to the current value(finish value)
  }
 },

// instance function 'opacacity'
// to control the change of fade in or fade out
 opacity:function(opc){
  opc=opc<0?0:opc>100?100:opc;
  var obj=this.obj;
  obj.style.filter='alpha(opacity='+opc+')';
  obj.style.opacity=obj.style.MozOpacity=obj.style.WebkitOpacity=obj.style.KhtmlOpacity=opc/100-.001;
 }
}