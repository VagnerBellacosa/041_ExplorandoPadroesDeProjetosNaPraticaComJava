 Public Class MyClass
    Private Shared _instancia As MyClass
    Private Shared objetoSincronia As New Object

    Private Sub New()
    End Sub

    Public Shared Function getInstancia() As MyClass
        If _instancia Is Nothing Then
            SyncLock objetoSincronia
                If _instancia Is Nothing Then _instancia = New MyClass
            End SyncLock
        End If
        Return _instancia
    End Function
 End Class