<template>
	<nav class="nav">
		<ul>
			<li>
				<router-link :to="{name:'Home'}">
					<div><img src="../assets/images/home.svg" alt=""></div>
					<div>首页</div>
				</router-link>
			</li>
			<li>
				<router-link :to="{name:'Cate'}">
					<div><img src="../assets/images/category.svg" alt=""></div>
					<div>分类</div>
				</router-link>
			</li>
			<li>
				<router-link :to="{name:'Cart'}">
					<div><img src="../assets/images/cart.svg" alt=""></div>
					<div>购物车</div>
				</router-link>
			</li>
			<li>
				<router-link :to="{name:'Me'}">
					<div><img src="../assets/images/me.svg" alt=""></div>
					<div>我</div>
				</router-link>
			</li>
		</ul>
	</nav>
</template>

<script>
	export default {
		data(){
			return {
				
			}
		}
	}
</script>

<style>
	nav {
		display: block;
		position: fixed;
		width: 100%;
		bottom: 0;		
		/* height: 60px; */
		background: rgba(255, 255, 255, .8);
		border-top: 1px #999 solid;
		padding: 4px 0;		
	}
	nav>ul {
		display: flex;
		flex-flow: row nowrap;
		justify-content: space-around;
		align-items: center;		
	}

</style>