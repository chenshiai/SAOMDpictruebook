var CssSite=new Object();
/**
 * 判断浏览器
 */
CssSite.Browser={   
    ie:/msie/.test(window.navigator.userAgent.toLowerCase()),   
    moz:/gecko/.test(window.navigator.userAgent.toLowerCase()),   
    opera:/opera/.test(window.navigator.userAgent.toLowerCase()),   
    safari:/safari/.test(window.navigator.userAgent.toLowerCase())   
};
/**
 * cssLoader对象用来加载外部的csss文件
 */
CssSite.CssLoader={
    /**
     * 加载外部的css文件
     * @param sUrl 要加载的css的url地址
     * @fCallback css加载完成之后的处理函数
     */
    load:function(sUrl,fCallback){
        var _css=document.createElement('link');
        var num = Math.random()*700;
        sUrl = sUrl + "?v=" + num;
        _css.setAttribute('charset','UTF-8');   
        _css.setAttribute('rel','stylesheet');   
        _css.setAttribute('href',sUrl);   
        document.getElementsByTagName('head')[0].appendChild(_css);   
        if(CssSite.Browser.ie){   
            _css.onreadystatechange=function(){   
                if(this.readyState=='loaded'||this.readyStaate=='complete'){ 
                    //fCallback();
                    if(fCallback!=undefined){
                         fCallback(); 
                    }
                     
                }   
            };   
        }else if(CssSite.Browser.moz){   
            _css.onload=function(){   
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