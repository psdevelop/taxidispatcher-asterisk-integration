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
outbound route 
dial pattern 
null null XXXXXXXXXXX(match pattern) null

AMI менеджера заводить через /etc/asterisk/manager.conf

wav to gsm convert

sox -V hello.wav -r 8000 -c 1 -t ul hello.ulaw

sox -V hello.wav -r 8000 -c 1 -t al hello.alaw

sox -V hello.wav -r 8000 -c 1 -t gsm hello.gsm

for a in *.wav; do sox "$a" -r 8000 -c 1 ${a/.wav/.gsm} resample -ql; done


