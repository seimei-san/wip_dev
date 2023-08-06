# wip_dev
このレポジトリには、メンターさんに参考にしていただく資料を目的として、WIPを構成する３つのサーバーサイドのコードを含めています。
本来、WIPは、これらの３つサーバーサイドを個別のサーバーにディプロイして動作させるように設計されています。
したがって、このレポジトリーをそのまま展開して３つサーバーサイドを一度に動作させることは出来ません。

# WIPの構成
WIPは、おおよそ下図のような構成になっています。
![image](https://github.com/seimei-san/wip_dev/assets/53326909/f3f53db4-c2dc-41d7-92c0-6d23c6dc15c7)

  ## Python Chatbot (code: wip_sym_chatbot_dev)
  チャットシステム（Symphony)からユーザーのメッセージを受信、またはWIPから発せられるメッセージの送信を司っています。
  このチャットボットは、受信したらメッセージを、WIP ServerにAPI経由で転送します。

  ## Python/Flask "WIP Server" (code: wip_app_dev)
  WIP Serverは、上記のチャットボットから受信したメッセージが分析対象ユーザーからのメッセージであるか判定し、対象の場合は、メッセージが依頼・指示・命令文であるかを判定します。
  受信した依頼・指示・命令文だった場合、ChatGPTのプロンプトとしてChatGPTに送信し、５W２Hの欠損検出を行います。
  GhatGPTから返されるレスポンスを受信し、検出の結果をMongoDBとMySQLに保存します。
  
  ## Laravel/PHP "WIP Applcation" (code: wip_arv_dev)
  WIP Applicationは、MySQLに保存されているユーザー情報及び各種基本データを維持管理をおこなうWEBユーザーインタフェースを提供します。
  また、５W２Hの検出結果及びChatGPTから受けたアドバイスを参照するWEBユーザーインターフェイスを提供します。

