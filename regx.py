from re import compile

data = '#446 in Books '

regx = compile('#([\d,]+)')

print regx.findall(data)