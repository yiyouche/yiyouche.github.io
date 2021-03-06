from django.shortcuts import render

# Create your views here.
from . import models

def index(request):
    mydb1=models.Mydb1.objects.all()
    return render(request,"index.html",{"mydb1":mydb1})

def index_action(request):
    pname=request.POST.get('pname')
    pphone=request.POST.get('pphone')
    pselect=request.POST.get('pselect')
    parea= request.POST.get('parea')
    models.Mydb.objects.create(user_name=pname,user_phone=pphone,user_select=pselect,user_area=parea)
    return render(request,'hello.html')

def carname(request):
    mydb=models.Mydb.objects.all()
    return render(request,"carname.html",{"mydb":mydb})

def carname_tj(request):
    name=request.POST.get('name')
    models.Mydb1.objects.create(select=name)
    users=models.Mydb.objects.all()
    return render(request,"carname.html",{"mydb":users})

def infos(request,user):
    user_info=models.Mydb.objects.get(pk=user)
    return render(request, "info_page.html",{"user":user_info})

def carsinfo(request):
    cars_info=models.Mydb1.objects.all()
    return render(request,"cars_info.html",{"cars_info":cars_info})

def carsdel(request,cars_id):
    models.Mydb1.objects.filter(id=cars_id).delete() #删除数据
    carsdel=models.Mydb1.objects.all()
    return render(request,"cars_info.html",{"cars_info":carsdel})

def carsup(request):
    # user_select=request.POST.get('name')
    # car=models.Mydb1.objects.get(pk=carsid)
    # car.select=user_select
    # car.save()
    # cars=models.Mydb1.objects.all()
    return render(request,"update.html")

