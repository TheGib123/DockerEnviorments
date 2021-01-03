from django.shortcuts import render, redirect
from django.views.decorators.http import require_POST
from .models import Todo
from .forms import *

# Create your views here.

def index(request):
    todo_list = Todo.objects.order_by('id')
    form = TodoForm()
    context = {'todo_list' : todo_list, 'form' : form}
    return render(request, 'todo/index.html', context)

def view_post(request, todo_id):
    todo = Todo.objects.get(pk=todo_id)
    print(todo)
    context = {'todo' : todo}
    return render(request, 'todo/view.html', context)

def uncheck_post(request, todo_id):
    todo = Todo.objects.get(pk=todo_id)
    todo.complete = False
    todo.save()
    return redirect('index')

def check_post(request, todo_id):
    todo = Todo.objects.get(pk=todo_id)
    todo.complete = True
    todo.save()
    return redirect('index')

def delete_post(request, todo_id):
    todo = Todo.objects.get(pk=todo_id)
    todo.delete()
    return redirect('index')

def edit_post(request, todo_id):
    todo = Todo.objects.get(pk=todo_id)
    context = {'todo' : todo}
    return render(request, 'todo/edit.html', context)


@require_POST
def addTodo(request):
    form = TodoForm(request.POST)
    print(request.POST['mytext'])
    if (form.is_valid()):
        new_todo = Todo(text=request.POST['mytext'])
        new_todo.save()
    return redirect('index')

@require_POST
def saveedit(request):
    print(request.POST['todoID'])
    print(request.POST['mytext'])
    todo_id = request.POST['todoID']
    todo = Todo.objects.get(pk=todo_id)
    todo.text = request.POST['mytext']
    todo.save()
    return redirect('index')