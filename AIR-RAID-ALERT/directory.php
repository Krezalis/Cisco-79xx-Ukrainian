<?php
header('Content-type: text/xml');
header('Connection: close');
header('Expires: -1');
header('Refresh: 10');

echo '<?xml version="1.0" encoding="utf-8" ?>';

if (isset($_GET['page'])) {
  echo '<CiscoIPPhoneDirectory>
<Title>Сторінка 1 із 1</Title>
<DirectoryEntry>
<Name>Тест</Name>
<Telephone>+380670000000</Telephone>
</DirectoryEntry>
<DirectoryEntry>
<Name>Тест 2</Name>
<Telephone>555</Telephone>
</DirectoryEntry>
</CiscoIPPhoneDirectory>';
} else {
  echo '<CiscoIPPhoneMenu>
  <Title>Каталоги</Title>
  <MenuItem>
  <Name>Телефонний довідник</Name>
  <URL>http://192.168.1.1/directory.php?page=1</URL>
  </MenuItem>
  <Prompt>Оберіть контакт</Prompt>
  <SoftKeyItem>
    <Name>Exit</Name>
    <Position>3</Position>
    <URL>Init:Directories</URL>
  </SoftKeyItem>
  <SoftKeyItem>
    <Name>Select</Name>
    <Position>1</Position>
    <URL>SoftKey:Select</URL>
  </SoftKeyItem>
  </CiscoIPPhoneMenu>
  ';
};

?>