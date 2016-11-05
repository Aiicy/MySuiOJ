# MySui Online Judge

![MySui Online Judge](http://p1.bqimg.com/4851/0fd6d74c68b6e5b3.png)
[MySui Online Judge](https://github.com/MySuiLab/MySuiOJ) 是一个开源的在线评测 C, C++, Java 和
Python 程序的系统,基于CodeIgniter框架开发。

前端网页及交互页面由PHP语言开发，后端主要采用BASH。

Python代码的测试目前还没有使用沙箱，仅使用一种低权限的操作来判定python。

如果你想要使用Online　Judge来判定python, 用你自己的安全环境或使用支持python的沙箱。

关于Online Judge完整的使用文档在 https://github.com/MySuiLab/MySuiOJ/wiki

如果你在使用过程中遇到任何问题或有好的建议，欢迎加入http://club.mysui.org ，我们一起讨论。

Demo(CA):[MySui Online Judge](http://demo.mysui.org)

Demo(CN):[MySui Online Judge](http://demo.cn.mysui.org)

## 功能
  * 多种用户权限 (管理员, 班主任, 老师, 学生)
  * 沙箱 _(暂不支持python)_
  * 作弊判定 (查找相似代码) 更多 [Moss](http://theory.stanford.edu/~aiken/moss/)
  * 可定制评测最近一次提交的规则
  * 提交队列
  * 以excel文件的形式下载评测结果
  * 通过zip格式的压缩包下载已提交的代码
  * 通过_"输出比较"_ 和 _"测试代码"_ 的形式来检测提交代码输出的正确性
  * 多用户支持
  * 支持多种格式的题目描述文件 (PDF/Markdown/HTML)
  * 可以重新进行判定
  * 积分板
  * 推送通知
  * ...

## 安装要求

[详细安装文档](https://github.com/MySuiLab/MySuiOJ/wiki)

要运行MySui Online Judge，需要一个linux系统，且满足以下条件：

  * 服务器运行的PHP的版本为5.3或更新，并且有着`mysqli`扩展
  * 装有PHP CLI (PHP的命令行界面, i.e. `php` shell 命令)
  * 使用的数据库为MySql或PostgreSql
  * 安装的PHP必须有权限运行shell命令 使用方法 [`shell_exec()`](http://www.php.net/manual/en/function.shell-exec.php) php函数 （特别是 `shell_exec("php");`）
  * 装有编译和运行提交的代码的工具 (`gcc`, `g++`, `javac`, `java`, `python2` 和 `python3`)
  * 最好装有`perl`，使得能更精确的测量提交代码的运行时间和所耗内存以及体积大小。

## 安装

  1. 下载需要版本的代码 [code page](https://github.com/MySuiLab/MySuiOJ/releases) ，把解压缩所得的文件放入网页文件夹里，例如apache2默认的文件夹是/var/www/html。
  2. **[可选]** 移动文件夹 `system` 和 `application` 到你的个人目录下， 并把所在目录的完整路径写在　`index.php`　文件里 （`$system_path`　和　`$application_folder` 这两个参数）。
  3. 专门为Online Judge创建一个MySql或是PostgreSql的数据库。不要安装任何用C/C++, Java或Python语言编写的数据库连接软件。
  4. 在`application/config/database.php`文件里设置数据库连接选项。
  5. **[重要]**使文件夹 `application/cache/Twig` php可写，而不是只有owner。
  6. 在浏览器里打开Online Judge的主页，开始安装。
  7. 使用上一步设置的管理员账户登陆。
  8. **[重要]** 移动文件夹 `tester` 和 `assignments` 到你的个人目录下，然后把它们的完整路径写在 `设置` 页面里. **这两个文件夹必须使得PHP可写而不是只有owner.** 提交的文件将被放置在 `assignments` 文件夹里，所以应该放在非公开目录里。
  9. **[重要]** [MySui Online Judge安全相关](https://github.com/MySuiLab/MySuiOJ/wiki)

## 安装之后

  * 阅读[文档](https://github.com/MySuiLab/MySuiOJ/wiki)

## 开源协议

GPL v3
