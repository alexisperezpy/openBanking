# Proyecto OpenBanking 
Es un proyecto simple de API-Rest, desarrollado con tecnología Laravel para transacciones bancarias falsas (que sirven solo de ejemplo). Con esta API se van a poder realizar los siguiente tipos de transacción;

### Crear una cuenta con un balance inicial.
```
    Ruta: POST /event 
    Data: {"type":"deposit","destination":"100","amount":50}  
    respuesta -> 201, {"destination":{"origin":{"id":"100", "balance":50}}
```

### Depositar en una cuenta existente.
```
    Ruta: POST /event 
    Data: {"type":"deposit","destination":"100","amount":10}
    respuesta -> 201, {"destination":{"id":"100", "balance":60}}
```

### Consultar el balance de una cuenta existente.
```
   Ruta: GET /balance?account_id=100 
   respuesta -> 200, {"balance":60}
```

### Bloquear un retiro de una cuenta inexistente.
```
    Ruta: POST /event 
    Data: {"type":"withdraw", "origin":"200", "amount":10}
    respuesta -> 404, cuenta invalida  
```

### Extraer saldo de una cuenta existente
```
    Ruta: POST /event 
    Data: {"type":"withdraw", "origin":"100", "amount":10}
    respuesta -> 201, {"origin":{"id":"100", "balance":50}}
```

### Realizar transferencias entre cuentas existentes
```
    Ruta: POST /event 
    Data: {"type":"transfer", "origin":"100", "amount":20, "destination":"300"}
    respuesta -> 201, {"origin":{"id":"100", "balance":30}, 
                "destination":{"id":"300", "balance":20}}
```

### Bloquear transferencia de cuenta inexistente
```
    Ruta: POST /event 
    Data: {"type":"transfer", "origin":"200", "amount":10, "destination":"300"}
    respuesta -> 404, cuenta inexistente
```