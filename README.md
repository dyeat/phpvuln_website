# phpvuln_website
一個開發者疏忽的網站漏洞靶機


## Requirements

* PHP > 5.6
* mysql > 5.0

--- 


## Sample

![image](https://github.com/dyeat/phpvuln_website/assets/7974325/2270806f-2f03-43b1-96a7-1428e847be5d)

## Set DB Config 

###  1. 設定資料庫連線 db_conn.php

``` php
$host = '127.0.0.1';   
$dbname = 'blog';		
$username = '';	
$password = '';			
```
###  2. 匯入 blog.sql 資料

---

漏洞
1. index.php 存在 LFI 漏洞 使用 page 進行讀取
2. 後台 存在檔案上傳漏洞可繞過,或上傳圖片檔夾雜PHP程式
3. 透過LFI漏洞,讀取後臺圖片檔,達成 Revshell

漏洞思路
1. 發現robots.txt 有後台路徑
2. 後台的檢視原始碼當中包含註冊頁面
3. 嘗試註冊 admin 帳號,會顯示有上傳頁面(未使用admin也可用一般使用者搭配字典檔找到上傳頁面)
4. 發現無法上傳非圖片檔,更改(Content-Type 可繞過) 
5. 上傳含有php程式圖片檔,與首頁 LFI漏洞 串在一起，達成 RCE