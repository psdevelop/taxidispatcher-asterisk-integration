# taxidispatcher-asterisk-integration
Code and resources for integration Taxidispatcher system with Asterisk PBX (код и ресурсы для интеграции программного комплекса Taxidispatcher c цифровой АТС Астериск, робот отзвона, определение звонков, очередь звонков)

[directories](!)
astetcdir => /etc/asterisk
astmoddir => /usr/lib/asterisk/modules
astvarlibdir => /var/lib/asterisk
astdbdir => /var/lib/asterisk
astkeydir => /var/lib/asterisk
astdatadir => /var/lib/asterisk
astagidir => /var/lib/asterisk/agi-bin
astspooldir => /var/spool/asterisk
astrundir => /var/run/asterisk
astlogdir => /var/log/asterisk
astsbindir => /usr/sbin

/var/lib/asterisk/sounds/


!!!!!!!!!   https://wiki.asterisk.org/wiki/display/AST/Directory+and+File+Structure

wget http://..../agi-play1.tmp

mv agi-play1.tmp agi-play1.php

chmod 777 agi-play1.php

cd /etc/asterisk/

nano extensions_custom.conf
======================
inbound sample

trunk siplink49911

username=001771-74991163772
type=friend
secret=b15b1c7f
insecure=invite
host=sip.siplink.pro
fromuser=001771-74991163772
fromdomain=sip.siplink.pro
dtmfmode=rfc2833
disallow=all
defaultuser=001771-74991163772
defaultexpiry=360
context=from-trunk
canreinvite=no
allow=alaw

001771-74991163772:b15b1c7f@sip.siplink.pro/001771-74991163772

===================
outbound sample

trunk siplink988

type=friend
secret=8a6b8793
insecure=invite
host=sip.siplink.pro
username=001771-79883138837
fromuser=001771-79883138837
fromdomain=sip.siplink.pro
dtmfmode=rfc2833
disallow=all
defaultuser=001771-79883138837
defaultexpiry=360
context=from-trunk
canreinvite=no
allow=alaw

001771-79883138837:8a6b8793@sip.siplink.pro/001771-79883138837
=====================
SIPSAMSUNG

host=192.168.0.200
port=5060
type=peer
allow=alaw,ulaw
disallow=all
=====================
outbound route 
dial pattern 
null null XXXXXXXXXXX(match pattern) null

AMI менеджера заводить через /etc/asterisk/manager.conf

wav to gsm convert

rm v*.gsm

sox -V hello.wav -r 8000 -c 1 -t ul hello.ulaw

sox -V hello.wav -r 8000 -c 1 -t al hello.alaw

sox -V hello.wav -r 8000 -c 1 -t gsm hello.gsm

for a in *.wav; do sox "$a" -r 8000 -c 1 ${a/.wav/.gsm} resample -ql; done

sox -V v1snd2.wav -r 8000 -c 1 -t gsm v1snd2.gsm
sox -V v1snd3.wav -r 8000 -c 1 -t gsm v1snd3.gsm
sox -V v1snd4.wav -r 8000 -c 1 -t gsm v1snd4.gsm
sox -V v3snd10.wav -r 8000 -c 1 -t gsm v3snd10.gsm
sox -V v3snd17.wav -r 8000 -c 1 -t gsm v3snd17.gsm
sox -V v3snd11.wav -r 8000 -c 1 -t gsm v3snd11.gsm
sox -V v3snd12.wav -r 8000 -c 1 -t gsm v3snd12.gsm
sox -V v3snd13.wav -r 8000 -c 1 -t gsm v3snd13.gsm
sox -V v3snd14.wav -r 8000 -c 1 -t gsm v3snd14.gsm
sox -V v3snd15.wav -r 8000 -c 1 -t gsm v3snd15.gsm
sox -V v3snd16.wav -r 8000 -c 1 -t gsm v3snd16.gsm
sox -V v3snd18.wav -r 8000 -c 1 -t gsm v3snd18.gsm
sox -V v3snd19.wav -r 8000 -c 1 -t gsm v3snd19.gsm
sox -V v3snd20.wav -r 8000 -c 1 -t gsm v3snd20.gsm
sox -V v3snd21.wav -r 8000 -c 1 -t gsm v3snd21.gsm
sox -V v3snd22.wav -r 8000 -c 1 -t gsm v3snd22.gsm
sox -V v3snd23.wav -r 8000 -c 1 -t gsm v3snd23.gsm
sox -V v3snd24.wav -r 8000 -c 1 -t gsm v3snd24.gsm
sox -V v3snd25.wav -r 8000 -c 1 -t gsm v3snd25.gsm
sox -V v3snd26.wav -r 8000 -c 1 -t gsm v3snd26.gsm
sox -V v3snd27.wav -r 8000 -c 1 -t gsm v3snd27.gsm
sox -V v3snd28.wav -r 8000 -c 1 -t gsm v3snd28.gsm
sox -V v3snd29.wav -r 8000 -c 1 -t gsm v3snd29.gsm
sox -V v3snd30.wav -r 8000 -c 1 -t gsm v3snd30.gsm

echo "This is the message body" | mutt -s "hello" -a /var/lib/asterisk/sounds/v3snd10.gsm -- psdevelop@yandex.ru

настройка гоип 
https://wiki.merionet.ru/ip-telephoniya/56/integraciya-goip-1-i-asterisk/

OUTBOUND name 'SIP988'
host=192.168.0.105
port=5060
secret=xxxxxxxxxxx
type=peer
context=from-internal
dtmfmode=rfc2833
insecure=very&port,invite
qualify=yes
defaultuser=ikshagoip
nat=no
disallow=all
allow=alaw&ulaw
canreinvite=no

INBOUND name 'ikshagoip'
type=friend
host=dynamic
secret=njutv64b568ybec
context=from-trunk
dtmfmode=rfc2833
canreinvite=no
qualify=yes
