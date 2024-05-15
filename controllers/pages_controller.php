<?php
require_once ('controllers/base_controller.php');
require_once ('models/post.php');
require_once ('models/home.php');

// require_once ('controllers/post_controller.php');


class PagesController extends BaseController
{
    function __construct()
    {
        $this->folder = 'pages';
    }

    function showPage($page)
    {
        $data = array(
            'titlePage' => $page,
            'header' => $page
        );
        $this->render($page, $data);
    }
    public function home()
    {
        $posts = Post::getRecent();
        $authors = Author::all();
        $movies = CategoryMovie::all();
        $lightnovels = LightNovel::all();
        $data = array(
            'titlePage' => 'AW',
            'posts' => $posts,
            'authors' => $authors,
            'movies' => $movies,
            'lightnovels' => $lightnovels
        );
        $this->render('home', $data);
    }

    
    public function about()
    {
        $authors = Author::all();

        $data = array(
            'titlePage' => 'about',
            'header' => 'about',
            'authors' => $authors
        );
        $this->render('about', $data);
    }
    public function services()
    {
        $movies = CategoryMovie::all();
        $data = array(
            'titlePage' => 'Anime',
            'header' => 'Anime',
            'movies' => $movies
        );
        $this->render('services', $data);
    }

    public function package()
    { 
        $movies = CategoryMovie::all();
        $lightnovels = LightNovel::all();

        $data = array(
            'titlePage' => 'Light Novel',
            'header' => 'Light Novel',
            'movies' => $movies,
            'lightnovels' => $lightnovels
        );
        $this->render('package', $data);
    }

    public function error()
    {
        $this->showPage('error');
    }

    public function MailAW()
    {
        $mail = $_POST['mail'];
        $name = $_POST['name'];
        $subject = 'Welcome To Anime World ';
        $content = 'Hello ' . $name . '! Welcome to Anime World.';
        $content = '<!DOCTYPE html
        PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html dir="ltr" lang="en">
    
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
        <style>
            @font-face {
                font-family: "BlinkMacSystemFont";
                font-style: normal;
                font-weight: 400;
                mso-font-alt: "Segoe UI";
    
            }
    
            * {
                font-family: "BlinkMacSystemFont", Segoe UI, Helvetica, Arial, sans-serif;
            }
        </style>
    </head>
    
    <body style="background-color:#f5f8ff;color:#21293c;margin:0;padding:0px 0px 0px 0px">
        <table align="center" width="100%" border="0" cellPadding="0" cellSpacing="0" role="presentation"
            style="max-width:600px;min-width:300px;min-height:20px;background-color:#f5f8ff;border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:10px;border-bottom-right-radius:10px;padding:10px 0px 7px 0px;width:100%;margin-left:auto;margin-right:auto">
            <tbody>
                <tr style="width:100%">
                    <td>
                        <table align="center" width="100%" border="0" cellPadding="0" cellSpacing="0" role="presentation"
                            style="color:#000000;background-color:#FFFFFF;border-radius:0.375rem;border:0px solid #777;padding:10px 35px 10px 35px;margin:0px 0px 0px 0px">
                            <tbody>
                                <tr>
                                    <td>
                                        <table align="center" width="100%" border="0" cellPadding="0" cellSpacing="0"
                                            role="presentation">
                                            <tbody style="width:100%">
                                                <tr style="width:100%">
                                                    <td align="left" data-id="__react-email-column"><img title="Image"
                                                            alt="Image"
                                                            src="https://i.ibb.co/h2XqqbP/logo.png"
                                                            style="display:block;outline:none;border:none;text-decoration:none;width:78px;height:72px;max-width:100%;border-radius:0" />
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <h1
                                            style="text-align:left;margin:0px 0px 0px 0px;padding:15px 0px 8px 0px;font-weight:900;font-size:32px;line-height:initial">
                                            Cảm ơn bạn đã đăng ký gói Premium</h1>
                                        <table align="center" width="100%" border="0" cellPadding="0" cellSpacing="0"
                                            role="presentation"
                                            style="color:inherit;background-color:transparent;padding:0px 0px 0px 0px;border:0px solid #777">
                                            <tbody style="width:100%">
                                                <tr style="width:100%">
                                                    <td data-id="__react-email-column"
                                                        style="color:inherit;vertical-align:middle;border-radius:0.375rem;padding:0px 0px 0px 0px;background-color:transparent;border:0px solid #777">
                                                        <table align="center" width="100%" border="0" cellPadding="0"
                                                            cellSpacing="0" role="presentation">
                                                            <tbody style="width:100%">
                                                                <tr style="width:100%">
                                                                    <td align="center" data-id="__react-email-column"><img
                                                                            title="Image" alt="Image"
                                                                            src="https://i.ibb.co/h2XqqbP/logo.png"
                                                                            style="display:block;outline:none;border:none;text-decoration:none;width:53px;height:53px;max-width:100%;border-radius:0.375rem" />
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td data-id="__react-email-column"
                                                        style="color:inherit;vertical-align:top;border-radius:0.375rem;padding:0px 10px 0px 10px;background-color:transparent;border:0px solid #777">
                                                        <p
                                                            style="font-size:14px;line-height:24px;margin:16px 0;text-align:left;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale">
                                                            <span style="color:#ff6154;font-size:inherit">
                                                                Anime World</span><br />Thank You ' . $name . '!
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p
                                            style="font-size:14px;line-height:24px;margin:16px 0;text-align:left;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale">
                                            Chào mừng bạn đến AnimeWolrd</p>
                                        <p
                                            style="font-size:14px;line-height:24px;margin:16px 0;text-align:left;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale">
                                            Please click the button below to verify your email address and confirm your
                                            request. We&#x27;ll get back to you shortly.</p>
                                        <table align="center" width="100%" border="0" cellPadding="0" cellSpacing="0"
                                            role="presentation" style="max-width:100%;text-align:center">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <table align="center" width="100%" border="0" cellPadding="0"
                                                            cellSpacing="0" role="presentation">
                                                            <tbody style="width:100%">
                                                                <tr style="width:100%"><a href="https://travelerdemo.free.nf"
                                                                        style="line-height:100%;text-decoration:none;display:inline-block;max-width:100%;background-color:#ff6154;border-radius:0.375rem;padding:6px 17px 6px 17px;margin:0px 0px 0px 0px;text-align:center;color:#25262B"
                                                                        target="_blank"><span><!--[if mso]><i style="letter-spacing: 17px;mso-font-width:-100%;mso-text-raise:9" hidden>&nbsp;</i><![endif]--></span><span
                                                                            style="max-width:100%;display:inline-block;line-height:120%;mso-padding-alt:0px;mso-text-raise:4.5px"><b><span
                                                                                    style="color:#FFFFFF;font-size:14px">Verify
                                                                                    Email</span></b></span><span><!--[if mso]><i style="letter-spacing: 17px;mso-font-width:-100%" hidden>&nbsp;</i><![endif]--></span></a>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p
                                            style="font-size:14px;line-height:24px;margin:16px 0;text-align:left;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;max-width:600px">
                                            <span style="color:inherit;font-size:12px">If you did not make this claim,
                                                please ignore this email or contact us at </span><a
                                                href="mailto:support@animeworld.com" rel="noopener noreferrer nofollow"
                                                style="color:#ff6154;text-decoration:none;word-wrap:break-word"
                                                target="_blank"><span
                                                    style="color:inherit;font-size:12px">support@animeworld.com</span></a><span
                                                style="color:inherit;font-size:12px">.</span>
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p style="font-size:14px;line-height:24px;margin:16px 0"><br /></p>
                        <p
                            style="font-size:14px;line-height:24px;margin:16px 0;text-align:center;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale">
                            <span style="color:#4b587c;font-size:12px">You’re receiving this notification because you
                                recently claimed a hub on Anime World.</span><br /><span
                                style="color:rgb(75, 88, 124);font-size:12px">Anime World Inc., 90 Gold St, FLR 3, San
                                Francisco, CA 94133</span>
                        </p>
                        <p
                            style="font-size:14px;line-height:24px;margin:16px 0;text-align:center;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;max-width:600px">
                        
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
    
    </html>
                ';
    
        sendMail($mail, $subject, $content);
        header("location: index.php?controller=pages&action=home");
    }
}
