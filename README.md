# Cisco-79xx-Ukrainian

Локалізація міститься у файлі **mk-sip.jar** це ZIP архів з наступною структурою:

📁resources

📁resources/fonts

- sc-font.xml
- Unicode.font

📁resources/xml

- gen-dictionary.utf8.xml
- gen-kate.utf8.xml
- sip-c-dictionary.utf8.xml
- sip-s-dictionary.utf8.xml
- target-dictionary.utf8.xml
- target-skin.xml

У SEP------------.cnf.xml прописуємо:

```xml
<userLocale>
  <name>Ukraine</name> 
  <uid></uid> 
  <langCode>uk_UA</langCode> 
  <version>8.4.3.1000-1</version> 
  <winCharSet>utf-8</winCharSet> 
</userLocale>
<networkLocale>Ukraine</networkLocale> 
<networkLocaleInfo> 
  <name>Ukraine</name> 
  <uid></uid> 
  <version>8.4.3.1000-1</version> 
</networkLocaleInfo>
```
і кладемо у файл на TFTP /Ukraine/mk-sip.jar
