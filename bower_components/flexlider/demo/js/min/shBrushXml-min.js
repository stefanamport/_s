/**
 * SyntaxHighlighter
 * http://alexgorbatchev.com/SyntaxHighlighter
 *
 * SyntaxHighlighter is donationware. If you are using it, please donate.
 * http://alexgorbatchev.com/SyntaxHighlighter/donate.html
 *
 * @version
 * 3.0.83 (July 02 2010)
 * 
 * @copyright
 * Copyright (C) 2004-2010 Alex Gorbatchev.
 *
 * @license
 * Dual licensed under the MIT and GPL licenses.
 */
!function(){function e(){function e(e,n){var t=SyntaxHighlighter.Match,i=e[0],r=new XRegExp("(&lt;|<)[\\s\\/\\?]*(?<name>[:\\w-\\.]+)","xg").exec(i),l=[];if(null!=e.attributes)for(var x,s=new XRegExp("(?<name> [\\w:\\-\\.]+)\\s*=\\s*(?<value> \".*?\"|'.*?'|\\w+)","xg");null!=(x=s.exec(i));)l.push(new t(x.name,e.index+x.index,"color1")),l.push(new t(x.value,e.index+x.index+x[0].indexOf(x.value),"string"));return null!=r&&l.push(new t(r.name,e.index+r[0].indexOf(r.name),"keyword")),l}this.regexList=[{regex:new XRegExp("(\\&lt;|<)\\!\\[[\\w\\s]*?\\[(.|\\s)*?\\]\\](\\&gt;|>)","gm"),css:"color2"},{regex:SyntaxHighlighter.regexLib.xmlComments,css:"comments"},{regex:new XRegExp("(&lt;|<)[\\s\\/\\?]*(\\w+)(?<attributes>.*?)[\\s\\/\\?]*(&gt;|>)","sg"),func:e}]}"undefined"!=typeof require?SyntaxHighlighter=require("shCore").SyntaxHighlighter:null,e.prototype=new SyntaxHighlighter.Highlighter,e.aliases=["xml","xhtml","xslt","html"],SyntaxHighlighter.brushes.Xml=e,"undefined"!=typeof exports?exports.Brush=e:null}();