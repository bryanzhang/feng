import csv 
import sys 

f = file('huihua.csv', 'rb')
reader = csv.reader(f)

# avoid UnicodeDecodeError
reload(sys)
sys.setdefaultencoding( "utf-8" )

line = 0 
for Id, shopname, shopsite, abstract, shoptype, score_all, qualification, foundtime, addr, tel, contactinfo, opentime in reader:
  if line == 0:
    line = 1 
    continue
  print("update shop set shopsite='%s',shoptype='%s',qualification='%s',foundtime='%s',contactinfo='%s',opentime='%s' where Id=%s;" % (shopsite, shoptype, qualification, foundtime, contactinfo, opentime, Id));
  line += 1


