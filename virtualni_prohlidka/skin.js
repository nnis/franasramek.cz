function pano2vrSkin(player,skinlayer) {
	var me=this;
	var flag=false;
	this.player=player;
	this.player.skinObj=this;
	this.divSkin=(skinlayer)?skinlayer:player.divSkin;
	this.elementMouseDown=new Array();
	this.elementMouseOver=new Array();
	this.player.setMargins(0,0,0,0);
	this.updateSize=function(startElement) {
		var stack=new Array();
		stack.push(startElement);
		while(stack.length>0) {
			e=stack.pop();
			if (e.ggUpdatePosition) {
				e.ggUpdatePosition();
			}
			if (e.hasChildNodes()) {
				for(i=0;i<e.childNodes.length;i++) {
					stack.push(e.childNodes[i]);
				}
			}
		}
	}
	
	parameterToTransform=function(p) {
		return 'translate(' + p.rx + 'px,' + p.ry + 'px) rotate(' + p.a + 'deg) scale(' + p.sx + ',' + p.sy + ')';
	}
	
	this.findElements=function(id,regex) {
		var r=new Array();
		var stack=new Array();
		var pat=new RegExp(id,'');
		stack.push(me.divSkin);
		while(stack.length>0) {
			e=stack.pop();
			if (regex) {
				if (pat.test(e.ggId)) r.push(e);
			} else {
				if (e.ggId==id) r.push(e);
			}
			if (e.hasChildNodes()) {
				for(i=0;i<e.childNodes.length;i++) {
					stack.push(e.childNodes[i]);
				}
			}
		}
		return r;
	}
	
	this.addSkin=function() {
		this._controller=document.createElement('div');
		this._controller.ggId='controller'
		this._controller.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._controller.ggVisible=true;
		this._controller.ggUpdatePosition=function() {
			this.style.webkitTransition='none';
			h=this.parentNode.offsetHeight;
			this.style.top=(-39 + h) + 'px';
		}
		hs ='position:absolute;';
		hs+='left: 3px;';
		hs+='top:  -39px;';
		hs+='width: 286px;';
		hs+='height: 53px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		this._controller.setAttribute('style',hs);
		this._normal=document.createElement('div');
		this._normal.ggId='normal'
		this._normal.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._normal.ggVisible=true;
		this._normal.ggUpdatePosition=function() {
			this.style.webkitTransition='none';
			h=this.parentNode.offsetHeight;
			this.style.top=(-16 + h) + 'px';
		}
		hs ='position:absolute;';
		hs+='left: 40px;';
		hs+='top:  -16px;';
		hs+='width: 26px;';
		hs+='height: 24px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='cursor: pointer;';
		this._normal.setAttribute('style',hs);
		this._normal__img=document.createElement('img');
		this._normal__img.setAttribute('src','virtualni_prohlidka/images/normal.svg');
		this._normal__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 26px;height: 24px;');
		this._normal.appendChild(this._normal__img);
		this._normal.onclick=function () {
			me.player.toggleFullscreen();
		}
		this._normal.onmouseover=function () {
			me._tt_fullscreen.style.webkitTransition='none';
			me._tt_fullscreen.style.visibility='inherit';
			me._tt_fullscreen.ggVisible=true;
			me._normal__img.src='virtualni_prohlidka/images/normal__o.svg';
		}
		this._normal.onmouseout=function () {
			me._tt_fullscreen.style.webkitTransition='none';
			me._tt_fullscreen.style.visibility='hidden';
			me._tt_fullscreen.ggVisible=false;
			me._normal__img.src='virtualni_prohlidka/images/normal.svg';
		}
		this._tt_fullscreen=document.createElement('div');
		this._tt_fullscreen.ggId='tt_fullscreen'
		this._tt_fullscreen.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._tt_fullscreen.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -59px;';
		hs+='top:  23px;';
		hs+='width: 148px;';
		hs+='height: 16px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 0px solid #000000;';
		hs+='color: #ffffff;';
		hs+='text-align: center;';
		hs+='white-space: nowrap;';
		hs+='padding: 0px 1px 0px 1px;'
		hs+='overflow: hidden;';
		this._tt_fullscreen.setAttribute('style',hs);
		this._tt_fullscreen.innerHTML="Fullscreen";
		this._normal.appendChild(this._tt_fullscreen);
		this._controller.appendChild(this._normal);
		this.divSkin.appendChild(this._controller);
		this._loading=document.createElement('div');
		this._loading.ggId='loading'
		this._loading.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._loading.ggVisible=true;
		this._loading.ggUpdatePosition=function() {
			this.style.webkitTransition='none';
			w=this.parentNode.offsetWidth;
			this.style.left=(-105 + w/2) + 'px';
			h=this.parentNode.offsetHeight;
			this.style.top=(-30 + h/2) + 'px';
		}
		hs ='position:absolute;';
		hs+='left: -105px;';
		hs+='top:  -30px;';
		hs+='width: 210px;';
		hs+='height: 60px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		this._loading.setAttribute('style',hs);
		this._loading.onclick=function () {
			me._loading.style.webkitTransition='none';
			me._loading.style.visibility='hidden';
			me._loading.ggVisible=false;
		}
		this._obdlnk_10=document.createElement('div');
		this._obdlnk_10.ggId='Obd\xe9ln\xedk 10'
		this._obdlnk_10.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._obdlnk_10.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: -9px;';
		hs+='top:  -1px;';
		hs+='width: 227px;';
		hs+='height: 68px;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='opacity: 0.5;';
		hs+='visibility: inherit;';
		hs+='border: 0px solid #000000;';
		hs+='background-color: #ffffff;';
		this._obdlnk_10.setAttribute('style',hs);
		this._loading.appendChild(this._obdlnk_10);
		this._loadingtext=document.createElement('div');
		this._loadingtext.ggId='loadingtext'
		this._loadingtext.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._loadingtext.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 63px;';
		hs+='top:  13px;';
		hs+='width: auto;';
		hs+='height: auto;';
		hs+='-webkit-transform-origin: 50% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 0px solid #000000;';
		hs+='color: #000000;';
		hs+='text-align: left;';
		hs+='white-space: nowrap;';
		hs+='padding: 0px 1px 0px 1px;'
		hs+='overflow: hidden;';
		this._loadingtext.setAttribute('style',hs);
		this._loadingtext.ggUpdateText=function() {
			this.innerHTML="Na\u010d\xedt\xe1n\xed... "+(me.player.getPercentLoaded()*100.0).toFixed(0)+"%";
		}
		this._loadingtext.ggUpdateText();
		this._loading.appendChild(this._loadingtext);
		this._loadingbar=document.createElement('div');
		this._loadingbar.ggId='loadingbar'
		this._loadingbar.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
		this._loadingbar.ggVisible=true;
		hs ='position:absolute;';
		hs+='left: 15px;';
		hs+='top:  35px;';
		hs+='width: 181px;';
		hs+='height: 12px;';
		hs+='-webkit-transform-origin: 0% 50%;';
		hs+='visibility: inherit;';
		hs+='border: 1px solid #808080;';
		hs+='border-radius: 5px;';
		hs+='-webkit-border-radius: 5px;';
		hs+='-moz-border-radius: 5px;';
		hs+='background-color: #ffffff;';
		this._loadingbar.setAttribute('style',hs);
		this._loading.appendChild(this._loadingbar);
		this.divSkin.appendChild(this._loading);
		this.divSkin.ggUpdateSize=function(w,h) {
			me.updateSize(me.divSkin);
		}
		this.divSkin.ggLoaded=function() {
			me._loading.style.webkitTransition='none';
			me._loading.style.visibility='hidden';
			me._loading.ggVisible=false;
		}
		this.divSkin.ggReLoaded=function() {
			me._loading.style.webkitTransition='none';
			me._loading.style.visibility='inherit';
			me._loading.ggVisible=true;
		}
		this.divSkin.ggEnterFullscreen=function() {
		}
		this.divSkin.ggExitFullscreen=function() {
		}
		this.skinTimerEvent();
	};
	this.hotspotProxyClick=function(id) {
	}
	this.hotspotProxyOver=function(id) {
	}
	this.hotspotProxyOut=function(id) {
	}
	this.skinTimerEvent=function() {
		setTimeout(function() { me.skinTimerEvent(); }, 10);
		this._loadingtext.ggUpdateText();
		var hs='';
		if (me._loadingbar.ggParameter) {
			hs+=parameterToTransform(me._loadingbar.ggParameter) + ' ';
		}
		hs+='scale(' + (1 * me.player.getPercentLoaded() + 0) + ',1.0) ';
		me._loadingbar.style.webkitTransform=hs;
	};
	function SkinHotspotClass(skinObj,hotspot) {
		var me=this;
		var flag=false;
		this.player=skinObj.player;
		this.skin=skinObj;
		this.hotspot=hotspot;
		this.__div=document.createElement('div');
		this.__div.setAttribute('style','position:absolute; left:0px;top:0px;visibility: inherit;');
		if (hotspot.skinid=='hotspot') {
			this.__div=document.createElement('div');
			this.__div.ggId='hotspot'
			this.__div.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__div.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: 340px;';
			hs+='top:  20px;';
			hs+='width: 5px;';
			hs+='height: 5px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			this.__div.setAttribute('style',hs);
			this.__div.onclick=function () {
				me.player.openUrl(me.hotspot.url,me.hotspot.target);
				me.skin.hotspotProxyClick(me.hotspot.id);
			}
			this.__div.onmouseover=function () {
				me.player.hotspot=me.hotspot;
				me._hstext2.style.webkitTransition='none';
				me._hstext2.style.visibility='inherit';
				me._hstext2.ggVisible=true;
				me.skin.hotspotProxyOver(me.hotspot.id);
			}
			this.__div.onmouseout=function () {
				me.player.hotspot=me.player.emptyHotspot;
				me._hstext2.style.webkitTransition='none';
				me._hstext2.style.visibility='hidden';
				me._hstext2.ggVisible=false;
				me.skin.hotspotProxyOut(me.hotspot.id);
			}
			this._hsimage2=document.createElement('div');
			this._hsimage2.ggId='hsimage'
			this._hsimage2.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this._hsimage2.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: -16px;';
			hs+='top:  -16px;';
			hs+='width: 32px;';
			hs+='height: 32px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			hs+='cursor: pointer;';
			this._hsimage2.setAttribute('style',hs);
			this._hsimage2__img=document.createElement('img');
			this._hsimage2__img.setAttribute('src','virtualni_prohlidka/images/hsimage2.svg');
			this._hsimage2__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
			this._hsimage2.appendChild(this._hsimage2__img);
			this.__div.appendChild(this._hsimage2);
			this._hstext2=document.createElement('div');
			this._hstext2.ggId='hstext'
			this._hstext2.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this._hstext2.ggVisible=false;
			this._hstext2.ggUpdatePosition=function() {
				this.style.webkitTransition='none';
				this.style.left=(-50 + (100-this.offsetWidth)/2) + 'px';
			}
			hs ='position:absolute;';
			hs+='left: -50px;';
			hs+='top:  20px;';
			hs+='width: auto;';
			hs+='height: auto;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: hidden;';
			hs+='border: 1px solid #000000;';
			hs+='color: #000000;';
			hs+='background-color: #ffffff;';
			hs+='text-align: center;';
			hs+='white-space: nowrap;';
			hs+='padding: 0px 1px 0px 1px;'
			hs+='overflow: hidden;';
			this._hstext2.setAttribute('style',hs);
			this._hstext2.innerHTML=me.hotspot.title;
			this.__div.appendChild(this._hstext2);
		} else
		if (hotspot.skinid=='left') {
			this.__div=document.createElement('div');
			this.__div.ggId='left'
			this.__div.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__div.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: 236px;';
			hs+='top:  102px;';
			hs+='width: 5px;';
			hs+='height: 5px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			this.__div.setAttribute('style',hs);
			this.__div.onclick=function () {
				me.player.openUrl(me.hotspot.url,me.hotspot.target);
				me.skin.hotspotProxyClick(me.hotspot.id);
			}
			this.__div.onmouseover=function () {
				me.player.hotspot=me.hotspot;
				me._hstext1.style.webkitTransition='none';
				me._hstext1.style.visibility='inherit';
				me._hstext1.ggVisible=true;
				me.skin.hotspotProxyOver(me.hotspot.id);
			}
			this.__div.onmouseout=function () {
				me.player.hotspot=me.player.emptyHotspot;
				me._hstext1.style.webkitTransition='none';
				me._hstext1.style.visibility='hidden';
				me._hstext1.ggVisible=false;
				me.skin.hotspotProxyOut(me.hotspot.id);
			}
			this._hsimage1=document.createElement('div');
			this._hsimage1.ggId='hsimage'
			this._hsimage1.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this._hsimage1.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: -16px;';
			hs+='top:  -16px;';
			hs+='width: 32px;';
			hs+='height: 32px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='opacity: 0.8;';
			hs+='visibility: inherit;';
			hs+='cursor: pointer;';
			this._hsimage1.setAttribute('style',hs);
			this._hsimage1__img=document.createElement('img');
			this._hsimage1__img.setAttribute('src','virtualni_prohlidka/images/hsimage1.svg');
			this._hsimage1__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
			this._hsimage1.appendChild(this._hsimage1__img);
			this.__div.appendChild(this._hsimage1);
			this._hstext1=document.createElement('div');
			this._hstext1.ggId='hstext'
			this._hstext1.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this._hstext1.ggVisible=false;
			this._hstext1.ggUpdatePosition=function() {
				this.style.webkitTransition='none';
				this.style.left=(-50 + (100-this.offsetWidth)/2) + 'px';
			}
			hs ='position:absolute;';
			hs+='left: -50px;';
			hs+='top:  20px;';
			hs+='width: auto;';
			hs+='height: auto;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: hidden;';
			hs+='border: 1px solid #000000;';
			hs+='color: #000000;';
			hs+='background-color: #ffffff;';
			hs+='text-align: center;';
			hs+='white-space: nowrap;';
			hs+='padding: 0px 1px 0px 1px;'
			hs+='overflow: hidden;';
			this._hstext1.setAttribute('style',hs);
			this._hstext1.innerHTML=me.hotspot.title;
			this.__div.appendChild(this._hstext1);
		} else
		if (hotspot.skinid=='right') {
			this.__div=document.createElement('div');
			this.__div.ggId='right'
			this.__div.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__div.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: 486px;';
			hs+='top:  98px;';
			hs+='width: 5px;';
			hs+='height: 5px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			this.__div.setAttribute('style',hs);
			this.__div.onclick=function () {
				me.player.openUrl(me.hotspot.url,me.hotspot.target);
				me.skin.hotspotProxyClick(me.hotspot.id);
			}
			this.__div.onmouseover=function () {
				me.player.hotspot=me.hotspot;
				me._hstext0.style.webkitTransition='none';
				me._hstext0.style.visibility='inherit';
				me._hstext0.ggVisible=true;
				me.skin.hotspotProxyOver(me.hotspot.id);
			}
			this.__div.onmouseout=function () {
				me.player.hotspot=me.player.emptyHotspot;
				me._hstext0.style.webkitTransition='none';
				me._hstext0.style.visibility='hidden';
				me._hstext0.ggVisible=false;
				me.skin.hotspotProxyOut(me.hotspot.id);
			}
			this._hsimage0=document.createElement('div');
			this._hsimage0.ggId='hsimage'
			this._hsimage0.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this._hsimage0.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: -16px;';
			hs+='top:  -16px;';
			hs+='width: 32px;';
			hs+='height: 32px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='opacity: 0.8;';
			hs+='visibility: inherit;';
			hs+='cursor: pointer;';
			this._hsimage0.setAttribute('style',hs);
			this._hsimage0__img=document.createElement('img');
			this._hsimage0__img.setAttribute('src','virtualni_prohlidka/images/hsimage0.svg');
			this._hsimage0__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 32px;height: 32px;');
			this._hsimage0.appendChild(this._hsimage0__img);
			this.__div.appendChild(this._hsimage0);
			this._hstext0=document.createElement('div');
			this._hstext0.ggId='hstext'
			this._hstext0.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this._hstext0.ggVisible=false;
			this._hstext0.ggUpdatePosition=function() {
				this.style.webkitTransition='none';
				this.style.left=(-50 + (100-this.offsetWidth)/2) + 'px';
			}
			hs ='position:absolute;';
			hs+='left: -50px;';
			hs+='top:  20px;';
			hs+='width: auto;';
			hs+='height: auto;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: hidden;';
			hs+='border: 1px solid #000000;';
			hs+='color: #000000;';
			hs+='background-color: #ffffff;';
			hs+='text-align: center;';
			hs+='white-space: nowrap;';
			hs+='padding: 0px 1px 0px 1px;'
			hs+='overflow: hidden;';
			this._hstext0.setAttribute('style',hs);
			this._hstext0.innerHTML=me.hotspot.title;
			this.__div.appendChild(this._hstext0);
		} else
		{
			this.__div=document.createElement('div');
			this.__div.ggId='ahead'
			this.__div.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this.__div.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: 545px;';
			hs+='top:  189px;';
			hs+='width: 5px;';
			hs+='height: 5px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: inherit;';
			this.__div.setAttribute('style',hs);
			this.__div.onclick=function () {
				me.player.openUrl(me.hotspot.url,me.hotspot.target);
				me.skin.hotspotProxyClick(me.hotspot.id);
			}
			this.__div.onmouseover=function () {
				me.player.hotspot=me.hotspot;
				me._hstext.style.webkitTransition='none';
				me._hstext.style.visibility='inherit';
				me._hstext.ggVisible=true;
				me.skin.hotspotProxyOver(me.hotspot.id);
			}
			this.__div.onmouseout=function () {
				me.player.hotspot=me.player.emptyHotspot;
				me._hstext.style.webkitTransition='none';
				me._hstext.style.visibility='hidden';
				me._hstext.ggVisible=false;
				me.skin.hotspotProxyOut(me.hotspot.id);
			}
			this._hsimage=document.createElement('div');
			this._hsimage.ggId='hsimage'
			this._hsimage.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this._hsimage.ggVisible=true;
			hs ='position:absolute;';
			hs+='left: -17px;';
			hs+='top:  -17px;';
			hs+='width: 34px;';
			hs+='height: 34px;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='opacity: 0.8;';
			hs+='visibility: inherit;';
			hs+='cursor: pointer;';
			this._hsimage.setAttribute('style',hs);
			this._hsimage__img=document.createElement('img');
			this._hsimage__img.setAttribute('src','virtualni_prohlidka/images/hsimage.svg');
			this._hsimage__img.setAttribute('style','position: absolute;top: 0px;left: 0px;width: 34px;height: 34px;');
			this._hsimage.appendChild(this._hsimage__img);
			this.__div.appendChild(this._hsimage);
			this._hstext=document.createElement('div');
			this._hstext.ggId='hstext'
			this._hstext.ggParameter={ rx:0,ry:0,a:0,sx:1,sy:1 };
			this._hstext.ggVisible=false;
			this._hstext.ggUpdatePosition=function() {
				this.style.webkitTransition='none';
				this.style.left=(-50 + (100-this.offsetWidth)/2) + 'px';
			}
			hs ='position:absolute;';
			hs+='left: -50px;';
			hs+='top:  20px;';
			hs+='width: auto;';
			hs+='height: auto;';
			hs+='-webkit-transform-origin: 50% 50%;';
			hs+='visibility: hidden;';
			hs+='border: 1px solid #000000;';
			hs+='color: #000000;';
			hs+='background-color: #ffffff;';
			hs+='text-align: center;';
			hs+='white-space: nowrap;';
			hs+='padding: 0px 1px 0px 1px;'
			hs+='overflow: hidden;';
			this._hstext.setAttribute('style',hs);
			this._hstext.innerHTML=me.hotspot.title;
			this.__div.appendChild(this._hstext);
		}
	};
	this.addSkinHotspot=function(hotspot) {
		return new SkinHotspotClass(me,hotspot);
	}
	this.addSkin();
};