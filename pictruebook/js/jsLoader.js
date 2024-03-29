var MiniSite=new Object();
/**
 * 判断浏览器
 */
MiniSite.Browser={   
    ie:/msie/.test(window.navigator.userAgent.toLowerCase()),   
    moz:/gecko/.test(window.navigator.userAgent.toLowerCase()),   
    opera:/opera/.test(window.navigator.userAgent.toLowerCase()),   
    safari:/safari/.test(window.navigator.userAgent.toLowerCase())   
};
/**
 * JsLoader对象用来加载外部的js文件
 */
MiniSite.JsLoader={
    /**
     * 加载外部的js文件
     * @param sUrl 要加载的js的url地址
     * @fCallback js加载完成之后的处理函数
     */
    load:function(sUrl,fCallback){
        var _script=document.createElement('script');
        var num = Math.random()*700;
        sUrl = sUrl + "?v=" + num;
        _script.setAttribute('charset','UTF-8');   
        _script.setAttribute('type','text/javascript');   
        _script.setAttribute('src',sUrl);   
        document.getElementsByTagName('botjs')[0].appendChild(_script);   
        if(MiniSite.Browser.ie){   
            _script.onreadystatechange=function(){   
                if(this.readyState=='loaded'||this.readyStaate=='complete'){ 
                    //fCallback();
                    if(fCallback!=undefined){
                         fCallback(); 
                    }
                     
                }   
            };   
        }else if(MiniSite.Browser.moz){   
            _script.onload=function(){   
                //fCallback(); 
                if(fCallback!=undefined){
                        fCallback(); 
                }
            };   
        }else{   
            //fCallback();
            if(fCallback!=undefined){
                    fCallback(); 
            }
        }   
    }   
};