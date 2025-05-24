# Українізація телефонів Cisco-7942 (79xx)

Перевірено на 7942G
https://blog.uaid.net.ua/cisco-ip-7942g/

![Cisco_IP_Phone_7942G_01](https://user-images.githubusercontent.com/4151282/140582191-7049cf59-e369-4a43-a8c9-bd74a0782541.jpg)


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
  <version>9.4</version> 
  <winCharSet>utf-8</winCharSet> 
</userLocale>
<networkLocale>Ukraine</networkLocale> 
<networkLocaleInfo> 
  <name>Ukraine</name> 
  <uid></uid> 
  <version>9.4</version> 
</networkLocaleInfo>
```
і кладемо у файл на TFTP /Ukraine/mk-sip.jar

# Керування фоном заставкою
У конфіг додати 
```<authenticationURL>http://10.7.0.1/cisco/authentication.php</authenticationURL>
<phonePersonalization>1</phonePersonalization>
<autoCallPickupEnable>true</autoCallPickupEnable>
```

І в запит додати заголовки:
```Content-Type: application/x-www-form-urlencoded; charset=UTF-8
Content-Length: data.length
Authorization: Basic + Buffer.from('1' + ':' + '1').toString('base64')
```

За адресою авторизацї починна бути відповідь
```AUTHORIZED
```

![Ukraine_alert](https://github.com/Krezalis/Cisco-79xx-Ukrainian/assets/4151282/aeb02477-d018-4531-b504-d2307deadf76)
