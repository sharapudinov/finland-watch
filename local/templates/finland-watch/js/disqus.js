function setClass(elem, className){if(!hasClass(elem, className)){elem.className += ' ' + className;}}
function unsetClass(elem, className){elem.className = (' ' + elem.className + ' ').replace(' ' + className + ' ', ' ');}
function hasClass(elem, className){return (elem.className == className) || ((' ' + elem.className + ' ').indexOf(' ' + className + ' ') != -1);}
function _show(elem){unsetClass(elem, 'a_hidden');}
function _hide(elem){setClass(elem, 'a_hidden');}

function childs(tagName, className, childsOnly)
{
	var collection = [];
	var nodeList = childsOnly ? this.childNodes : this.getElementsByTagName(tagName);
	for(var i = 0, ln = nodeList.length; i < ln; i++)
		if((nodeList[i].nodeType !== 3) && ('tagName' in nodeList[i])
			&& (nodeList[i].tagName.toLowerCase() === tagName) && (className ? hasClass(nodeList[i], className) : true))
			collection.push(nodeList[i]);
	return collection;
}

function switchComm(tab)
{
	tab = tab.parentNode;
	if(hasClass(tab, 'a_active')) return true;

	var news = tab.parentNode.parentNode, tabs = [], themes = [];

	if(('themes' in news) && ('tabs' in news))
		tabs = news.tabs, themes = news.themes;
	else
	{
		news.tabs   = tabs   = childs.apply(tab.parentNode, ['li', null, true]);
		news.themes = themes = childs.apply(news, ['div', 'a_content', true]);
	}

	news.tabs.active = tab;
	var current = 0;
	for(var i = 0; i < themes.length; i++)
		(tabs[i] == tab)
			? (setClass(tabs[i], 'a_active'), _show(themes[i]), current = i)
			: (unsetClass(tabs[i], 'a_active'), _hide(themes[i]));
	return false;
}