<?php
header('Content-type: text/xml');
header('Connection: close');
header('Expires: -1');
header('Refresh: 10');
//https://www.voip-info.org/asterisk-cisco-79xx-xml-services/
echo '<?xml version="1.0" encoding="utf-8" ?>';
if (!isset($_GET['id'])) $_GET['id'] = 1;

switch ($_GET['id']) {
  case '1':
    echo "<CiscoIPPhoneText>
    <Title>Телеметрія</Title>
    <Prompt>Оновлено ".date('d.m.Y H:i:s')."</Prompt>
    <Text>Споживання: 100 Вт&#xA;".
    "Напруга: 230 В&#xA;".
    "Показник: 4444 кВт*год&#xA;".
    "Температура: 6 °C&#xA;".
    "Вологість: 55 %".
    "</Text>
    </CiscoIPPhoneText>";
    /*
    echo "<CiscoIPPhoneText>
    <Title>Оповіщення</Title>
    <Prompt>Натисніть кнопку Почати</Prompt>
    <Text>Оповіщення</Text>
    <SoftKeyItem>
      <Name>Почати</Name>
      <URL>RTPTx:Stop</URL>
      <URLDown>RTPMTx:239.0.0.45:20480</URLDown>
      <Position>1</Position>
    </SoftKeyItem>
    <SoftKeyItem>
      <Name>Вийти</Name>
      <URL>SoftKey:Exit</URL>
      <URLDown>http://192.168.1.1/page_stop.php</URLDown>
      <Position>4</Position>
    </SoftKeyItem>
  </CiscoIPPhoneText>";*/
    break;
  
  default:
    echo '<CiscoIPPhoneMenu>
    <Title>Навігація</Title>
    <Prompt>Якийсь текст</Prompt>
    <MenuItem>
    <Name>Статуси</Name>
    <URL>http://192.168.1.1/services.php?id=1</URL>
    </MenuItem>
    <MenuItem>
    <Name>Показники</Name>
    <URL>http://192.168.1.1/services.php?id=2</URL>
    </MenuItem>
    </CiscoIPPhoneMenu>';
    break;
}
?>