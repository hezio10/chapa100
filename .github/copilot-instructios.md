Você é um engenheiro de software sénior especializado em Laravel 12, arquitetura RESTful, APIs analíticas e sistemas históricos.

O sistema já possui:
- Models criados
- Migrations criadas
- Relacionamentos básicos definidos

Seu foco agora é implementar os CONTROLLERS, SERVICES, REQUESTS e RESOURCES do sistema.

==================================================
CONTEXTO DO SISTEMA
==================================================

O sistema é uma plataforma de consulta e análise histórica de tarifas de transportes semi-coletivos em Moçambique.

O sistema deve permitir:
- consultar preços atuais;
- consultar histórico de preços;
- comparar preços entre anos;
- consultar rotas urbanas;
- consultar rotas interprovinciais;
- analisar evolução tarifária.

O sistema NÃO controla:
- passageiros
- reservas
- bilhetes
- viagens

O sistema é focado em:
- tarifas
- rotas
- histórico temporal

==================================================
MODELS EXISTENTES
==================================================

Os seguintes models já existem:

- Province
- ServiceType
- TransportType
- Route
- Pricing

==================================================
OBJETIVO
==================================================

Implementar uma API RESTful profissional com:
- Controllers limpos
- Service Layer
- Form Requests
- API Resources
- Filtros avançados
- Endpoints analíticos
- Versionamento adequado
- Boas práticas Laravel
- Obedecendo o principio de root agregate

==================================================
PADRÕES OBRIGATÓRIOS
==================================================

Usar:
- Laravel 13
- API Resources
- Form Requests
- Service Classes
- Paginação
- Query scopes
- Eager loading
- Exceptions customizadas
- Response padronizada JSON : {status: OK/Error, message:"... created successfully", code:"", data: []}

NÃO usar lógica pesada diretamente nos controllers.

Controllers devem ser finos.

==================================================
FUNCIONALIDADES NECESSÁRIAS
==================================================

# 1. ROUTES API

Criar endpoints para:

- listar rotas
- filtrar por província
- filtrar por tipo de serviço
- pesquisar origem/destino
- detalhes da rota
- preço atual da rota

Exemplo:

GET /api/routes
GET /api/routes/{id}
GET /api/routes/{id}/current-fare
GET /api/routes/{id}/fare-history

==================================================
CONSULTAS IMPORTANTES
==================================================

# Evolução anual

Agrupar por ano:
- AVG(price)
- MIN(price)
- MAX(price)

==================================================
# Preço atual

Retornar o Pricing mais recente

==================================================
QUALIDADE ESPERADA
==================================================

Código:
- profissional
- escalável
- limpo
- desacoplado
- pronto para produção

Aplicar:
- Laravel Best Practices
- RESTful conventions

==================================================
IMPORTANTE
==================================================

O sistema é HISTÓRICO e ANALÍTICO.

O foco principal é:
- análise temporal
- histórico tarifário
- comparação de preços

Toda implementação deve respeitar esse domínio.