++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
https://www.figma.com/file/AwKKRaRtWKOMC8ndyX8aqa/%E5%A4%A7%E6%89%8BEC%E3%82%B5%E3%82%A4%E3%83%88%E3%81%AE%E4%BE%A1%E6%A0%BC%E8%AA%BF%E6%9F%BB%E3%83%BB%E8%87%AA%E5%8B%95%E5%A4%89%E6%9B%B4%E3%83%84%E3%83%BC%E3%83%AB%E3%81%AE%E4%BD%9C%E6%88%90?node-id=4%3A23
https://docs.google.com/spreadsheets/d/1OE1mfdN9d8GEBOfO28oL_c_8v3ajl5P8Yg11a563HqY/edit#gid=0
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
https://kakaku.ultra-cloud.com/ultra-cloud/user/login
enishinise_demo
admin
pass4825
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
https://secure.sakura.ad.jp/vps/login
ログイン情報
ユーザーID：geq67856
パスワード：o2yo89hpA8m2

サーバーログイン情報
ユーザー名：root
パスワード：pass1234

◆『Xserverアカウント』ログイン情報
　XserverアカウントID　　　　 ： phry341268
　メールアドレス　　　　　　　： service@enishinise.com
　Xserverアカウントパスワード ： WUBEHgCLRFC7
　ログインURL　　　　　　　　 ： https://secure.xserver.ne.jp/xapanel/login/xserver/


◆『サーバーパネル』ログイン情報
　サーバーID　　　　　： xs626768
　サーバーパスワード　： fj83n2qc
　サーバーパネル　　　： https://secure.xserver.ne.jp/xapanel/login/xserver/server/

　■FTP情報
　--------------------------------------------------------
　FTPホスト名（FTPサーバー名）　　： sv14150.xserver.jp
　FTPユーザー名（FTPアカウント名）： xs626768
　FTPパスワード　　　　　　　　　 ： fj83n2qc
　--------------------------------------------------------

mail
moon@xs626768.xsrv.jp
asdasd123

xs626768
fj83n2qc
162.43.120.151


Application ID/developer ID
(applicationId / developerId)

1006686799015924310

application_secret

83d6f6533ac827035dfc8403e57a5868a57d058c

Affiliate ID
(affiliateId)

2a5abedf.40d33840.2a5abee0.9ba74539
                                

Domain allowed for callbacks

xs626768.xsrv.jp

Policy URL




mv /home/xs626768/xs626768.xsrv.jp/public_html /home/xs626768/xs626768.xsrv.jp/_public_html

#シンボリックリンクを作成する

ln -s /home/recycle/www/public /home/recycle/recycle.xsrv.jp/public_html
ln -s /home/xs626768/yahoo_rakuten/public /home/xs626768/xs626768.xsrv.jp/public_html

https://phpmyadmin-sv14150.xserver.jp/?
xs626768_qoo
	xs626768_admin
admin123
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
160.16.198.145
Admin username
ubuntu
New admin user password
pass123

http://tk2-241-30141.vs.sakura.ne.jp/phpmyadmin

sudo mkdir /var/www/tk2-241-30141.vs.sakura.ne.jp
sudo chown -R $USER:$USER /var/www/tk2-241-30141.vs.sakura.ne.jp
sudo chmod -R 755 /var/www/tk2-241-30141.vs.sakura.ne.jp

sudo nano /etc/apache2/sites-available/tk2-241-30141.vs.sakura.ne.jp.conf
tk2-241-30141.vs.sakura.ne.jp.conf

<VirtualHost *:80>
    ServerAdmin webmaster@localhost
    ServerName tk2-241-30141.vs.sakura.ne.jp
    ServerAlias www.tk2-241-30141.vs.sakura.ne.jp
    DocumentRoot /var/www/tk2-241-30141.vs.sakura.ne.jp
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>

sudo a2ensite tk2-241-30141.vs.sakura.ne.jp.conf
sudo nano /var/www/tk2-241-30141.vs.sakura.ne.jp/info.php
sudo rm /var/www/tk2-241-30141.vs.sakura.ne.jp/info.php
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
++++ ADD Field USER TABLE
master_code
item_name
jan_code
group_set
memo
common_low_price, common_pro_price, common_normal_price, common_high_price, common_deli_price
rakuten_low_price, rakuten_pro_price, rakuten_normal_price, rakuten_high_price, rakuten_deli_price
yahoo_low_price, yahoo_pro_price, yahoo_normal_price, yahoo_high_price, yahoo_deli_price
//20
//rakuten_
search_kind
point_true
deli_true
free_deli_true
tracking_shop
low_price
out_keyword
out_store_ranking
survey_url
//9
item_url
tax
manager

