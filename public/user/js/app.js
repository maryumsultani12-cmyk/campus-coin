
const KEY="campuscoinData";
let data=JSON.parse(localStorage.getItem(KEY))||{
 user:{name:"Haniya Junaid",email:"haniya@example.com",academic:"1st Year",goal:8000},
 incomes:[
  {id:1,source:"Allowance",amount:25000,date:"2026-09-02",note:"Monthly allowance"},
  {id:2,source:"Part-time Job",amount:8500,date:"2026-09-12",note:"Website project"}
 ],
 expenses:[
  {id:3,category:"Food",amount:4200,date:"2026-09-05",note:"Campus meals"},
  {id:4,category:"Transport",amount:2100,date:"2026-09-07",note:"Tuition transport"},
  {id:5,category:"Academics",amount:2800,date:"2026-09-10",note:"Books and stationery"},
  {id:6,category:"Entertainment",amount:1900,date:"2026-09-15",note:"Movie outing"},
  {id:7,category:"Subscriptions",amount:1200,date:"2026-09-18",note:"Subscription"},
  {id:8,category:"Food",amount:3500,date:"2026-09-20",note:"Food delivery"}
 ],
 budgets:{Food:9000,Transport:5000,Academics:4000,Entertainment:3000,Subscriptions:2000},
 categories:{
  income:["Allowance","Part-time Job","Scholarship","Gift","Other Income"],
  expense:["Food","Transport","Hostel/Rent","Academics","Subscriptions","Entertainment","Miscellaneous"]
 }
};
function save(){localStorage.setItem(KEY,JSON.stringify(data))}
function money(n){return "Rs. "+Number(n||0).toLocaleString("en-PK")}
function esc(s){return String(s??"").replace(/[&<>"']/g,m=>({"&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#039;"}[m]))}
function toast(msg){let t=document.getElementById("toast");t.textContent=msg;t.classList.add("show");setTimeout(()=>t.classList.remove("show"),2200)}
function monthIn(){return data.incomes.filter(x=>x.date.startsWith("2026-09"))}
function monthOut(){return data.expenses.filter(x=>x.date.startsWith("2026-09"))}
function totals(){let i=monthIn().reduce((a,x)=>a+x.amount,0),e=monthOut().reduce((a,x)=>a+x.amount,0);return {i,e,b:i-e}}
function nextId(){return Date.now()+Math.floor(Math.random()*1000)}
