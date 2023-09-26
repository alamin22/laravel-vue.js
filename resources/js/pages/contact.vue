
<template>
	<div>
		<div class="container text-center mt-5">
			<div>
				<div class="alert alert-success" v-if="added==true">
					<b>{{ message }}</b>
				</div>
				<form @submit.prevent="isEdit == true ? editStoreData(editId) : addNewBook()">
				<input v-model="book.name" placeholder="Name" type="text" class="form-control">
				<input v-model="book.price" placeholder="Price" type="number" class="form-control">
				<input v-model="book.author" placeholder="Author Name" type="text" class="form-control">
				<button type="submit">{{isEdit==true?'Update':'Add Book'}}</button>
				</form>
			</div>
			
			<input v-model="item.key" @keyup="search()" placeholder="Search..." type="text" class="form-control">
			<div class="p-5" v-if="list.length==0">
				<div class="spinner-border text-success" role="status">
					<span class="sr-only">Loading...</span>
					
				</div>
				<h6 class="mt-5">Finding Data...</h6>
			</div>
			<div v-else>
				<h3>BOOK LIST</h3>
				
				<table class="table" >
					<thead>
						<tr>
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">Price</th>
						<th scope="col">Author</th>
						<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="data in list" :key="data.id">
							<th scope="row">{{data.id}}</th>
							<td>{{data.name}}</td>
							<td>{{data.price}}</td>
							<td>{{data.author}}</td>
							<td><a class="btn btn-success" @click="editData(data.id)">Edit</a>&nbsp;&nbsp;<span><a class="btn btn-danger" @click="deleteData(data.id)">Delete</a></span></td>
						</tr>
					</tbody>
				</table>
			</div>
			
		</div>
	</div>
</template>
<script>
import axios from 'axios'
export default{
	name:"Contact",
	data(){
		return{
			list: [],
			added:false,
			message:'',
			isEdit:false,
			editId : '',
			book:{
				name:'',
				price:'',
				author:'',
			},
			item:{
				key:'',
			}

		}
	},
	mounted(){
		this.faceAll();
	},
	methods:{
		addNewBook(){
			axios.post("http://localhost:8000/api/add-book",this.book)
				.then(
					res=>{
						this.faceAll();
						this.book.author='';
						this.book.name='';
						this.book.price='';
						this.message = res.data;
						this.added=true;
						setTimeout(()=>{
							this.added=false;
						},3000);
					}
				)
		},
	    faceAll(){
			axios.get("http://localhost:8000/api/getall")
				.then(res=>{
					this.list=res.data;

				})
		},
		search(){
			axios.post("http://localhost:8000/api/search",this.item)
				.then(res =>{
					this.list=res.data;
				})
		}, 
		editData(id){
			axios.post(`http://localhost:8000/api/edit/${id}`).then(
				res=>{
					this.isEdit=true;
					this.book.name = res.data.name;
					this.book.price = res.data.price;
					this.book.author = res.data.author;
					this.editId = id;
					console.log(res.data);
				}
			)
		},
		editStoreData(id){
			axios.post(`http://localhost:8000/api/edit-store/${id}`,this.book).then(
				res=>{
					this.faceAll();
					this.message = res.data;
					this.added = true;
					setTimeout(()=>{
						this.added=false;
					},3000);
					console.log(res.data);
				}
			)
		},
		deleteData(id){
			axios.post(`http://localhost:8000/api/delete/${id}`).then(
				res=>{
					this.faceAll();
					this.message = res.data;
					this.added=true;
					setTimeout(()=>{
						this.added=false;
					},3000);
					console.log(res.data);
				}
			)
		}
	}
}
</script>