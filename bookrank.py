#!/usr/bin/env python
from time import ctime
from atexit import register
from re import compile
from threading import Thread
from urllib2 import urlopen as uopen

regex = compile('#([\d,]+) in Books ')
amzn = "http://amazon.com/dp/"
ISBNs = {
    '0132269937':'Core Python Programming',
    '0132356139':'Python Web Development with Django',
    '0137143419':'Python Fundamentals',
}

def getRanking(isbn):
    page = uopen('%s%s' %(amzn, isbn))
    data = page.read()
    page.close()
    print regex.findall(data)

def _showRanking(isbn):
    print '- %r ranked %s' %(ISBNs[isbn], getRanking(isbn))

def main():
    _showRanking('0132269937')

@register
def _atexit():
    print 'all Done at :',ctime()

if __name__ == '__main__':
    main()



