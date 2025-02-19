import datetime

DATA_BASE_ANTIGA = datetime.date(1997, 10, 7)
DATA_LIMITE = datetime.date(2025, 2, 22)
DATA_BASE_NOVA = DATA_LIMITE - datetime.timedelta(days=1000)

def calcular_fator_antigo(data_vencimento):
    return (data_vencimento - DATA_BASE_ANTIGA).days

def calcular_fator_novo(data_vencimento):
    return (data_vencimento - DATA_BASE_NOVA).days

def calcular_fator_vencimento(data_vencimento):
    if (data_vencimento - DATA_LIMITE).days < 0:
        return calcular_fator_antigo(data_vencimento)
    else:
        return calcular_fator_novo(data_vencimento)

vencimento_str = input("Digite a data de vencimento (dd/mm/yyyy): ")
data_vencimento = datetime.datetime.strptime(vencimento_str, "%d/%m/%Y").date()
fator_vencimento = calcular_fator_vencimento(data_vencimento)

print(f"Data de vencimento: {data_vencimento.strftime('%d/%m/%Y')}")
print(f"Fator de vencimento: {fator_vencimento}")
