<?php
function xxx3() {
}

$test = 'ok05';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- import vue and then vue-mdc-adapter -->
  <script src="https://unpkg.com/vue"></script>

  <script src="https://unpkg.com/vue-router"></script>
  <script src="https://unpkg.com/jquery"></script>



<script type="text/javascript" src="js/app.js?ver=<?php echo filemtime('js/app.js');?>"></script>
<link rel="stylesheet" href="css/style.css" type="text/css">


</head>

<body>
  <div id="app" class="m-2">
	<router-view></router-view>
  </div>
</body>
</html>






<template id="top-page">
<div>
	<p>top-page</p>
	test

	<ul>
		<li><router-link :to="{ name: 'conv-article' }">文章変換ツール</router-link></li>
		<li><router-link :to="{ name: 'keynote-tool' }">keynoteツール</router-link></li>
	</ul>


</div>
</template>



<template id="conv-article-top">
<div>
	<router-link :to="{ name: 'top' }">top</router-link>

	<ul>
		<li><router-link :to="{ name: 'keynote-tool-circle-rotation-line' }">circleRotationLine</router-link></li>
	</ul>
</div>
</template>




<template id="conv-article-input-src">
<div>
	<router-link :to="{ name: 'top' }">top</router-link>

	<div>
	<button type="button" class="btn btn-outline-primary" @click="switchInputSrc">文章入力</button>
	<button type="button" class="btn btn-outline-primary" @click="switchEditYomi">読み編集</button>
	</div>


	<div v-show="showInputSrc">
		<h3>文章入力</h3>

		<div>
			<textarea v-model="article" cols="50" rows="10"></textarea>
		</div>

		<div>
			<button type="button" class="btn btn-primary" @click="getYomi">読み取得</button>
		</div>
	</div>


	<div v-show="showEditYomi">
		<h3>読み編集</h3>

		<div class="form-group bg-light p-2">
			<div>
				<label>１分あたりの読み上げ文字数</label>
				<input type="text" v-model="time_nomal">
			</div>

			<div>
				<label>速度係数</label>
				<input type="text" v-model="time_factor">
			</div>

			<div>
				<label>読点「、」の係数</label>
				<input type="text" v-model="time_comma">
			</div>
			<div>
				<label>句点「。！？」の係数</label>
				<input type="text" v-model="time_full_stop">
			</div>
			<div>
				<label>行末の読点「、」の係数</label>
				<input type="text" v-model="time_comma_eol">
			</div>
			<div>
				<label>行末の句点「。！？」の係数</label>
				<input type="text" v-model="time_full_stop_eol">
			</div>
		</div>


		<div>
			<div v-for="item in yomi_list" :key="item.id" class="mb-2">
				<p class="lead mb-0">{{item.form_letter}}　</p>

				<div class="input-group" v-if="item.form_letter">
					<div class="input-group-prepend">
						<span class="input-group-text" style="width: 65px;">{{getStrtime(item.reading)}}</span>
					</div>
					<input class="form-control" type="text" v-model="item.reading">
				</div>
			</div>
		</div>
	</div>

</div>
</template>





<template id="conv-article-edit-yomi">
<div>
	<router-link :to="{ name: 'conv-article' }">文章入力</router-link>

	<div>
		文章
		<textarea v-model="article" cols="50" rows="50"></textarea>
	<div>

	<div>
		<span><a @click="getYomi">変換</a></span>
	<div>


	<div>
		読み
	<div>


	<div>
		読み数
	<div>


	<div>
		秒数
	<div>

</div>
</template>






<template id="keynote-tool-top">
<div>
	<router-link :to="{ name: 'top' }">top</router-link>

	<ul>
		<li><router-link :to="{ name: 'keynote-tool-circle-rotation-line' }">circleRotationLine</router-link></li>
	</ul>
</div>
</template>



<template id="keynote-tool-circle-rotation-line">
<div>
<router-link :to="{ name: 'keynote-tool' }">keynoteツール</router-link>

<p>circleRotationLine</p>

<div>
<label class="require">ステージサイズ</label>
<select v-model="select_option_stage_size">
<option value="1280,720">1280×720</option>
<option value="1920,1080">1920×1080</option>
</select>
</div>

<hr>

<div>
<label class="require">円 線幅</label>
<input type="text" v-model.number="circle.line_width">
</div>

<div>
<label>ギャップ</label>
<input type="text" v-model="circle.gap" readonly>
</div>

<hr>

<div>
<label class="require">円 外側 直径</label>
<input type="text" v-model.number="circle01.r2">
</div>

<div>
<label>円 外側 X</label>
<input type="text" v-model="circle01.x" readonly>
</div>

<div>
<label>円 外側 Y</label>
<input type="text" v-model="circle01.y" readonly>
</div>


<hr>

<div>
<label>円 内側 直径</label>
<input type="text" v-model="circle02.r2" readonly>
</div>

<div>
<label>円 内側 X</label>
<input type="text" v-model="circle02.x" readonly>
</div>

<div>
<label>円 内側 Y</label>
<input type="text" v-model="circle02.y" readonly>
</div>


<hr>

<div>
<label>マスク右 幅</label>
<input type="text" v-model="mask01.w" readonly>
</div>

<div>
<label>マスク右 高さ</label>
<input type="text" v-model="mask01.h" readonly>
</div>

<div>
<label>マスク右 X</label>
<input type="text" v-model="mask01.x" readonly>
</div>

<div>
<label>マスク右 Y</label>
<input type="text" v-model="mask01.y" readonly>
</div>

<hr>

<div>
<label>マスク下 幅</label>
<input type="text" v-model="mask02.w" readonly>
</div>

<div>
<label>マスク下 高さ</label>
<input type="text" v-model="mask02.h" readonly>
</div>

<div>
<label>マスク下 X</label>
<input type="text" v-model="mask02.x" readonly>
</div>

<div>
<label>マスク下 Y</label>
<input type="text" v-model="mask02.y" readonly>
</div>

<hr>

<div>
<label class="require">円 小 直径</label>
<input type="text" v-model.number="circle03.r2">
</div>

<div>
<label>円 小 X</label>
<input type="text" v-model="circle03.x" readonly>
</div>

<div>
<label>円 小 Y</label>
<input type="text" v-model="circle03.y" readonly>
</div>

<hr>

<div>
<label>マーカー 幅</label>
<input type="text" v-model="marker.w" readonly>
</div>

<div>
<label>マーカー 高さ</label>
<input type="text" v-model="marker.h" readonly>
</div>

<hr>

<div>
<label>マーカー 1 X</label>
<input type="text" v-model="marker01.x" readonly>
</div>

<div>
<label>マーカー 1 Y</label>
<input type="text" v-model="marker01.y" readonly>
</div>

<hr>

<div>
<label>マーカー 2 X</label>
<input type="text" v-model="marker02.x" readonly>
</div>

<div>
<label>マーカー 2 Y</label>
<input type="text" v-model="marker02.y" readonly>
</div>

<hr>

<div>
<label>マーカー 3 X</label>
<input type="text" v-model="marker03.x" readonly>
</div>

<div>
<label>マーカー 3 Y</label>
<input type="text" v-model="marker03.y" readonly>
</div>

<hr>

<div>
<label>オブジェクト X</label>
<input type="text" v-model="object.x" readonly>
</div>

<div>
<label>オブジェクト Y</label>
<input type="text" v-model="object.y" readonly>
</div>

<hr>

<div>
<label>マスク 1 幅</label>
<input type="text" v-model="mask03.w" readonly>
</div>

<div>
<label>マスク 1 高さ</label>
<input type="text" v-model="mask03.h" readonly>
</div>

<div>
<label>マスク 1 X</label>
<input type="text" v-model="mask03.x" readonly>
</div>

<div>
<label>マスク 1 Y</label>
<input type="text" v-model="mask03.y" readonly>
</div>

<hr>

<div>
<label>マスク 1 カット 直径</label>
<input type="text" v-model="maskCircle01.r2" readonly>
</div>

<div>
<label>マスク 1 カット X</label>
<input type="text" v-model="maskCircle01.x" readonly>
</div>

<div>
<label>マスク 1 カット Y</label>
<input type="text" v-model="maskCircle01.y" readonly>
</div>

<div>
<label>マスク 1 ↑ X</label>
<input type="text" v-model="maskCircle01.xx" readonly>
</div>

<div>
<label>マスク 1 ↑ Y</label>
<input type="text" v-model="maskCircle01.yy" readonly>
</div>

<hr>

<div>
<label>マスク 2 幅</label>
<input type="text" v-model="mask04.w" readonly>
</div>

<div>
<label>マスク 2 高さ</label>
<input type="text" v-model="mask04.h" readonly>
</div>

<div>
<label>マスク 2 X</label>
<input type="text" v-model="mask04.x" readonly>
</div>

<div>
<label>マスク 2 Y</label>
<input type="text" v-model="mask04.y" readonly>
</div>

<hr>

<div>
<label>マスク 3 幅</label>
<input type="text" v-model="mask05.w" readonly>
</div>

<div>
<label>マスク 3 高さ</label>
<input type="text" v-model="mask05.h" readonly>
</div>

<div>
<label>マスク 3 X</label>
<input type="text" v-model="mask05.x" readonly>
</div>

<div>
<label>マスク 3 Y</label>
<input type="text" v-model="mask05.y" readonly>
</div>

<hr>

<div>
<label>マスク 4 幅</label>
<input type="text" v-model="mask06.w" readonly>
</div>

<div>
<label>マスク 4 高さ</label>
<input type="text" v-model="mask06.h" readonly>
</div>

<div>
<label>マスク 4 X</label>
<input type="text" v-model="mask06.x" readonly>
</div>

<div>
<label>マスク 4 Y</label>
<input type="text" v-model="mask06.y" readonly>
</div>
