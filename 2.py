#! /usr/bin/python
import re
import urllib.request



def getHtml(url):
    page = urllib.request.urlopen(url)
    #retrun a object
    html = page.read()
    return html

def getImg(html):
    reg = re.match(r'src=".+\.jpg" width',html)
    return reg.groups()

html = getHtml('http://www.baidu.com')
print(getImg(html))

