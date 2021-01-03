from django.urls import path, re_path


from . import views

urlpatterns = [
    re_path(r'^$',views.index, name='index'),
    re_path(r'^add$',views.addTodo, name='add'),
    re_path(r'^view/(?P<todo_id>\d+)$', views.view_post, name='view'),
    re_path(r'^uncheck/(?P<todo_id>\d+)$', views.uncheck_post, name='uncheck'),
    re_path(r'^check/(?P<todo_id>\d+)$', views.check_post, name='check'),
    re_path(r'^delete/(?P<todo_id>\d+)$', views.delete_post, name='delete'),
    re_path(r'^edit/(?P<todo_id>\d+)$', views.edit_post, name='edit'),
    re_path(r'^saveedit$', views.saveedit, name='saveedit')
]
