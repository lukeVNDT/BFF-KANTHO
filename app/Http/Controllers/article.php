<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\articlemodel;
use App\articlecat;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\notify;

class article extends Controller
{
	public function getdetail(Request $req, $article_id){
		$detail = articlemodel::where('article_id',$article_id)->get();
		$recent_post = articlemodel::orderBy('created_at','DESC')->take(5)->get();
		foreach ($detail as $key => $dt) {
			$title = $dt->article_name;
			$desc = $dt->article_desc;
			$img = url('/public/upload/article/'.$dt->article_avatar);
		}
		return view('pages.article.detail')->with(compact('detail','title','desc','img','recent_post'));
	}
	public function loadmoreart(Request $req){
		if($req->ajax())
		{
			if($req->id > 0)
			{
				$article = articlemodel::where('article_id','<', $req->id)->orderBy('article_id','DESC')->limit(5)->get();
			}
			else
			{
				$article= articlemodel::orderBy('article_id','DESC')->limit(5)->get();
			}
			 $output = '';
            $last_id = '';
            if(!$article->isEmpty()){
                foreach ($article as $key => $value) {
                    $output .= '
                                <div class="col-lg-6 col-md-6">
                                    <div class="li-blog-single-item pb-25">
                                        <div class="li-blog-banner embed-responsive embed-responsive-16by9">
                                            <iframe src="https://www.youtube.com/embed/DR2c266yWEA" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        </div>
                                        <div class="li-blog-content">
                                            <div class="li-blog-details">
                                                <h3 class="li-blog-heading pt-25"><a href="blog-details-left-sidebar.html">blog video post</a></h3>
                                                <div class="li-blog-meta">
                                                    <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>
                                                    <a class="comment" href="#"><i class="fa fa-comment-o"></i> 3 comment</a>
                                                    <a class="post-time" href="#"><i class="fa fa-calendar"></i> 25 nov 2018</a>
                                                </div>
                                                <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Cras pretium arcu ex.</p>
                                                <a class="read-more" href="blog-details-left-sidebar.html">Read More...</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                    ';               
                    
                                    

                }
                $last_id = $value->artice_id;
                $output .='<div id="taithem">
                                         <div class="col-md-10"><button data-id="'.$last_id.'" type="button" class="btn btn-outline-info loadmore"><i class="fas fa-arrow-down"></i> Xem thêm</button></div>
                                     </div>';
            }else{
                $output .='<div id="taithem">
                                         <div class="col-md-10"><button disabled data-id="'.$last_id.'" type="button" class="btn btn-outline-info loadmore"><i class="fas fa-arrow-down"></i> Không còn bài viết nào khác</button></div>
                                     </div>';
            }
            echo $output;
        }
		
	}
	public function indexarticle(Request $req){
		$url_canonical = $req->url();
		$listarticle = articlemodel::orderBy('article_id','DESC')->paginate(6);
		return view('pages.article.listarticle')->with(compact('listarticle','url_canonical'));
	}
    public function index(){
    	$user = User::find(Session::get('staff_id'));
        $notify = notify::where('read_at',0)->orderBy('id','DESC')->limit(5)->get();
    	$article = articlemodel::with('adminmodel')->paginate(5);
    	// dd($article);

    	$cat = articlecat::all();

    	$viewdata = [
    		'article' => $article,
    		'cat' => $cat,
    		'user' => $user,
    		'notify' => $notify
    	];
    	return view('adminpages.article.article', $viewdata);
    }
    public function insert(Request $req){
    	$article = new articlemodel;
    	$article['article_name'] = $req->article_name;
    	$article['articlecat_id'] = $req->article_catid;
    	$article['article_desc'] = $req->article_desc;
    	$article['article_content'] = $req->article_content;
    	$article['staff_id'] = $req->staff_id;
    	if($req->hasfile('article_img')){
    		$file = $req->file('article_img');
    		$extension = $file->getClientOriginalExtension();
    		$filename = time() . '.' . $extension;
    		$file->move('public/upload/article', $filename);
    		$article['article_avatar'] = $filename;

    	}

    	$article->save();

    	return Redirect::to('/listarticle')->with('success', 'Thêm bài viết thành công');
    }
    public function edit($article_id, Request $req){

    	if($req->ajax()){
            $htmlOption = '';
    		$article = articlemodel::find($article_id);
            $articlecat = articlecat::all();
            
            foreach ($articlecat as $value) {
                $catid = $value->articlecat_id;
                $catname = $value->articlecat_name;
                if( $catid == $article->articlecat_id)
                {
                $htmlOption .= "<option selected value='".$catid."'>".$catname."</option>";
                }
                else
                {
                     $htmlOption .= "<option value='".$catid."'>".$catname."</option>";
                }
            }
            
              
    		return view('pages.component.editarticle')->with(compact('article','articlecat','htmlOption'));   	
        }
    }
    public function save(Request $req, $article_id){
        // dd($req->all());
        $article = array();
    	$article['article_name'] = $req->article_name;
    	$article['articlecat_id'] = $req->article_catid;
    	$article['article_desc'] = $req->article_desc;
    	$article['article_content'] =  $req->article_content;
        $getimage = $req->article_img2;
        if($getimage){
            $extension = $getimage->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $getimage->move('public/upload/article', $filename);
            $article['article_avatar'] = $filename;
            articlemodel::where('article_id',$article_id)->update($article);
            return Redirect::to('/listarticle')->with('success', 'Cập nhật bài viết thành công');
        }
    	articlemodel::where('article_id',$article_id)->update($article);
    	return Redirect::to('/listarticle')->with('success', 'Cập nhật bài viết thành công');
    }
    public function delete(Request $req){
    	articlemodel::where('article_id',$req->id)->delete();
    	return Redirect('/listarticle');
    }
}
