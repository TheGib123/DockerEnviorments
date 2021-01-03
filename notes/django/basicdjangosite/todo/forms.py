from django import forms

class TodoForm(forms.Form):
    mytext = forms.CharField(max_length=40)

