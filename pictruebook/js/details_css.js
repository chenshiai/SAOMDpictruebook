var css = document.createElement('link');
css.href = "../css/index.css?ve=" + Math.random();
css.rel = "stylesheet";
css.type = "text/css";
document.getElementsByTagName('head')[0].appendChild(css);

var css2 = document.createElement('link');
css2.href = "../css/details.css?ve=" + Math.random();
css2.rel = "stylesheet";
css2.type = "text/css";
document.getElementsByTagName('head')[0].appendChild(css2);